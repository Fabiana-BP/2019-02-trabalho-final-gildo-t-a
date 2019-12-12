<?php

namespace App\Http\Controllers;

use App\Way;
use App\Armchair;
use App\Vehicle;
use App\Company;
use App\Order;
use App\Passenger;
use App\Category;
use App\Nocustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($first,$last,$date,$passenger)
    {
      $sources=Way::orderBy('departure_city')->select('departure_city')->distinct()->get();
      $destinations=Way::orderBy('stop_city')->select('stop_city')->distinct()->get();
      $categories=Category::orderBy('title')->get();

      $no_seats=DB::table('ways')->whereRaw('departure_city = ? and stop_city = ? and nocustomers.date_trip=?',[$first,$last,$date])
                  ->join('nocustomers','nocustomers.way_id','=','ways.id')
                  ->select(DB::raw('count(nocustomers.id) as available'),'ways.id as ways_id')
                  ->groupBy('ways.id')->get();

                //  echo $no_seats;

     $filtered_way = DB::table('ways')->whereRaw('ways.departure_city = ? and ways.stop_city = ?',[$first,$last])
            ->join('vehicles','ways.vehicle_id','=','vehicles.id')
            ->join('companies','vehicles.company_id','=','companies.id')
            ->select('ways.id as ways_id','companies.name as cname','ways.departure_city as first_city','ways.stop_city as last_city',
            'ways.timetable as timetable','vehicles.max_seats as max_seats','ways.price as price','ways.discount as discount')
            ->distinct()
            ->get();
          //echo $filtered_way;

      //Passar dados para a view
      return view('filtered_routes',compact('filtered_way','date','passenger','categories','sources','destinations','no_seats'));
    }

    public function max_seats($way_id,$passenger,$date,$order_id){
      //precisa estar logado
      if(Auth::check()){
        if(Auth::user()->user_role=='client'){
          //dd($request);
          $way=Way::find($way_id);
          $vehicle=Vehicle::orderBy('board')->where('id','=',$way->vehicle->id)->first();
          $ways=Way::orderBy('departure_city')->where('vehicle_id','=',$vehicle->id)->get();
          $armchairs=Nocustomer::orderBy('way_id')->whereRaw('date_trip  = ? and way_id = ?',[$date,$way_id])->select('seat')->get();
          $nav=6;
          $categories=Category::orderBy('title')->get();




          return view('comprar.choose_armchairs',['armchairs'=>$armchairs,'categories'=>$categories,'vehicle'=>$vehicle,
          'ways'=>$ways,'date_trip'=>$date,'way'=>$way,'passenger'=>$passenger,'order_id'=>$order_id]);

          }else{
            return abort(403,'Operação não permitida!');
          }
        }else{
          session(['function' => 'max_seats','way_id'=>$way_id,'passenger'=>$passenger,'date'=>$date,'order_id'=>$order_id]);
          return redirect()->route('login');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($vehicle_id)
    {
      if(Auth::check()){
        if(Auth::user()->user_role=='company'){
          $company=Company::find(Auth::User()->company);
          $municipios=DB::table('Municipio')->orderBy('Nome')->get();
          $nav=8;
          $vehicle=Vehicle::find($vehicle_id);

          return view('admin.index',['municipios'=>$municipios,'company'=>$company,'nav'=>$nav,'vehicle'=>$vehicle]);

        }else{
          return abort(403,'Operação não permitida!');
        }
      }else{
        return redirect('/login');
      }
    }

    public function showroutes($vehicle_id){
      if(Auth::check()){
        if(Auth::user()->user_role=='company'){
          $company=Company::find(Auth::User()->company);
          $nav=7;
          $vehicle=Vehicle::find($vehicle_id);
          $ways=Way::orderBy('departure_city')->orderBy('stop_city')->where('vehicle_id','=',$vehicle_id)->get();

          return view('admin.index',['ways'=>$ways,'company'=>$company,'nav'=>$nav,'vehicle'=>$vehicle]);
        }else{
          return abort(403,'Operação não permitida!');
        }
      }else{
        return redirect('/login');
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(Auth::check()){
        if(Auth::user()->user_role=='company'){
          //validar
          //dd($request);
          $validatedData = $request->validate(
            [
              'vehicle_id'=>'required|integer|exists:vehicles,id',
              'departure_city'=>'required|max:255',
              'stop_city' =>'required|max:255',
              'price' =>'required|numeric',
              'discount' =>'numeric',
              'timetable'=>'required|date_format:H:i',
            ]);
            if(!empty($request->discount) && $request->discount>1){
              session()->flash('mensagem1','Valor inválido de desconto!');
              return redirect()->back();
            }
          $save=Way::create($request->all());

          if($save){
            session()->flash('mensagem','Cadastro realizado com sucesso!');
            $company=Company::find(Auth::User()->company);
            $nav=7;
            $vehicle=Vehicle::find($request->vehicle_id);
            $ways=Way::orderBy('departure_city')->orderBy('stop_city')->where('vehicle_id','=',$vehicle->id)->get();

            return view('admin.index',['ways'=>$ways,'company'=>$company,'nav'=>$nav,'vehicle'=>$vehicle]);
          }else{
            session()->flash('mensagem1','Desculpe, ocorreu um erro. Por favor, tente mais tarde!');
            return redirect()->back();
          }

        }else{
          return abort(403,'Operação não permitida!');
        }
      }else{
        return redirect('/login');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Way  $way
     * @return \Illuminate\Http\Response
     */
    public function show(Way $way)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Way  $way
     * @return \Illuminate\Http\Response
     */
    public function edit($way)
    {
      if(Auth::check()){
        if(Auth::user()->user_role=='company'){
          $company=Company::find(Auth::User()->company);
          $municipios=DB::table('Municipio')->orderBy('Nome')->get();
          $nav=9;
          $way=Way::find($way);
          $vehicle=$way->vehicle;

          return view('admin.index',['municipios'=>$municipios,'company'=>$company,'nav'=>$nav,'vehicle'=>$vehicle,'way'=>$way]);

        }else{
          return abort(403,'Operação não permitida!');
        }
      }else{
        return redirect('/login');
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Way  $way
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$way)
    {
      if(Auth::check()){
        if(Auth::user()->user_role=='company'){
          //validar
          //dd($request);
          $validatedData = $request->validate(
            [
              'vehicle_id'=>'required|integer|exists:vehicles,id',
              'departure_city'=>'required|max:255',
              'stop_city' =>'required|max:255',
              'price' =>'required|numeric',
              'discount' =>'numeric',
              'timetable'=>'required',
            ]);
            if(!empty($request->discount) && $request->discount>1){
              session()->flash('mensagem1','Valor inválido de desconto!');
              return redirect()->back();
            }
            //echo $request->vehicle_id;
            //echo $way;
          //  dd($request);
          $way=Way::find($way);
          $way->vehicle_id=$request->vehicle_id;
          $way->departure_city=$request->departure_city;
          $way->stop_city=$request->stop_city;
          $way->price=$request->price;
          $way->discount=$request->discount;
          $way->timetable=$request->timetable;
          $save = $way->save();//persiste no bd

          if($save){
            session()->flash('mensagem','Atualização realizada com sucesso!');
            $company=Company::find(Auth::User()->company);
            $nav=7;
            $vehicle=$way->vehicle;
            $ways=Way::orderBy('departure_city')->orderBy('stop_city')->where('vehicle_id','=',$vehicle->id)->get();

            return view('admin.index',['ways'=>$ways,'company'=>$company,'nav'=>$nav,'vehicle'=>$vehicle]);
          }else{
            session()->flash('mensagem1','Desculpe, ocorreu um erro. Por favor, tente mais tarde!');
            return redirect()->back();
          }

        }else{
          return abort(403,'Operação não permitida!');
        }
      }else{
        return redirect('/login');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Way  $way
     * @return \Illuminate\Http\Response
     */
    public function destroy($way)
    {
      if(Auth::check()){
      if(Auth::user()->user_role=="company"){
        $way=Way::find($way);
        //validação (pode ser excluído?)
        $vehicle=$way->vehicle;
        $nocustomers=$way->nocustomers->count();
        $orders=$way->orders->count();
       if($nocustomers<1 && $orders<1 ){
          $way->delete();
          session()->flash('mensagem','Rota excluída com sucesso!');
          $company=Company::find(Auth::User()->company);
          $nav=7;

          $ways=Way::orderBy('departure_city')->orderBy('stop_city')->where('vehicle_id','=',$vehicle->id)->get();

          return view('admin.index',['ways'=>$ways,'company'=>$company,'nav'=>$nav,'vehicle'=>$vehicle]);
        }

        session()->flash('mensagem','Rota não pode ser excluída!');
        return redirect()->back();
      }else{
        return abort(403,'Operação não permitida!');
      }
    }else{
      return redirect()->route('login');
    }
    }

    public function willdestroy($way){
      $way=Way::find($way);
      $company=Company::find(Auth::User()->company);
      return view('admin.delete_route',['way'=>$way,'company'=>$company]);
    }


}
