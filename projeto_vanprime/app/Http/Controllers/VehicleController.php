<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\Category;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{

  public function __construct(){
      $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Auth::User()->user_role == "company"){
        $vehicles=Vehicle::orderBy('board')->where('company_id','=',Auth::User()->company)->get();
        $company=Company::find(Auth::User()->company);
        $nav=2;
        return view('admin.index',['company'=>$company,'nav'=>$nav,'vehicles'=>$vehicles]);
      }else{
        return abort(403,'Operação não permitida!');
      }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if(Auth::User()->user_role == "company"){
        $categories=Category::orderBy('title')->get();
        $company=Company::find(Auth::User()->company);
        $nav=1;
        return view('admin.index',['categories'=>$categories,'company'=>$company,'nav'=>$nav]);
      }else{
          return abort(403,'Operação não permitida!');
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
      if(Auth::User()->user_role == "company"){
        $company=Company::find(Auth::User()->company);
        //validação
        $validatedData = $request->validate(
          [
            'board'=>'required|min:7|max:7|unique:vehicles',
            'category_id'=>'required|integer',
            'max_seats'=>'required|integer',
          ]);
          //dd($request);
          //gravar
          $v=new Vehicle;
          $v->board=strtoupper($request->board);
          $v->category_id=$request->category_id;
          $v->max_seats=$request->max_seats;
          $v->company_id=Auth::User()->company;

          $save=$v->save();
          if($save){
            $nav=2;
            //dd($request);
            session()->flash('mensagem','Cadastro realizado com sucesso!');
            $vehicles=Vehicle::orderBy('board')->where('company_id','=',Auth::User()->company)->get();
            return view('admin.index',['company'=>$company,'nav'=>$nav,'vehicles'=>$vehicles]);
          }else{
            session()->flash('mensagem1','Desculpe, ocorreu um erro. Tente mais tarde!');
            return redirect()->back();
          }

        }else{
              return abort(403,'Operação não permitida!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
      if(Auth::User()->user_role == "company"){
        //echo $vehicle;
        $company=Company::find(Auth::User()->company);
        $categories=Category::orderBy('title')->get();
        $nav=3;
        return view('admin.index',compact('categories','nav','company','vehicle'));
      }else{
        return abort(403,'Operação não permitida!');
      }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if(Auth::User()->user_role == "company"){
        $vehicle = Vehicle::find($id);
        $company=Company::find(Auth::User()->company);
        $categories=Category::orderBy('title')->get();
        $nav=4;
        return view('admin.index',['categories'=>$categories,'company'=>$company,'nav'=>$nav,'vehicle'=>$vehicle]);
      }else{
        return abort(403,'Operação não permitida!');
      }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      if(Auth::User()->user_role == "company"){
        $company=Company::find(Auth::User()->company);
        //validação

        //dd($request);

        $validatedData = $request->validate(
          ['board'=>'required|min:7|max:7',
          'category_id'=>'required|integer',
          'max_seats'=>'required|integer',
        ]);
        $vehicle=Vehicle::find($id);
        $vehicle->board=strtoupper($request->board);
        $vehicle->category_id=$request->category_id;
        $vehicle->max_seats=$request->max_seats;
        $vehicle->company_id=Auth::User()->company;
        try{
          $save=$vehicle->save();//persiste no bd
        }catch(Exception $e){
          session()->flash('mensagem1','Desculpe, ocorreu um erro tente mais tarde!');
          return redirect()->back();
        }


        if($save){
          session()->flash('mensagem','Veículo Atualizado com Sucesso!');
          $categories=Category::orderBy('title')->get();
          $vehicles=Vehicle::orderBy('board')->where('company_id','=',Auth::User()->company)->get();
          $nav=2;
          return view('admin.index',['categories'=>$categories,'company'=>$company,'nav'=>$nav,'vehicles'=>$vehicles]);
        }else{
          session()->flash('mensagem1','Desculpe, ocorreu um erro tente mais tarde!');
          return redirect()->back();
        }
      }else{
        return abort(403,'Operação não permitida!');
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
}
