<?php

namespace App\Http\Controllers;

use App\Order;
use App\Category;
use App\Passenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
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
    if(Auth::user()->user_role == 'client'){
      $nav=3;
      $categories=Category::orderBy('title')->get();
      $orders=Order::orderBy('created_at')->where('user_id','=',Auth::User()->id)->get();
      $passengers=Array();
      foreach ($orders as $o) {
        $passengers[] = $o->passengers->count();
      }

      return view('client.index',['nav'=>$nav,'categories'=>$categories,'orders'=>$orders, 'passengers'=>$passengers]);
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
      //dd(session()->all());
      if(Auth::user()->user_role == 'client'){
        $categories=Category::orderBy('title')->get();
        if(session()->get('acao')=='comprar'){
          $date_trip = session()->get('date');
          $passenger = session()->get('passenger');
          $price = session()->get('price');
          $way_id = session()->get('way_id');
          $cost=$price*$passenger;
          return view('comprar.efetuar_compra',compact('categories','date_trip','passenger','way_id','price','cost'));
        }else{
          return redirect('/home');
        }

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
    //  dd($request);
      if(Auth::user()->user_role == 'client'){
        $categories=Category::orderBy('title')->get();
        //verificar numero de passageiros (se há vagas)
        $no_seats=DB::table('nocustomers')->where('way_id','=',$request->way_id)
                    ->select(DB::raw('count(id) as available'))
                    ->get();
        //echo $no_seats;

        $max=DB::table('vehicles')->where('ways.id','=',$request->way_id)
        ->join('ways','ways.vehicle_id','=','vehicles.id')
        ->select('vehicles.max_seats as max_seats')->get();
        //echo $max;
        $max_seats=0;
        $available=0;
        foreach ($max as $k) {
          $max_seats=$k->max_seats;
          break;
        }
        foreach ($no_seats as $k) {
          $available=$k->available;
          break;
        }


        $seats=$max_seats - $available;
        //echo $seats;


        if($request->passenger > $seats){
          session()->flash('mensagem1','Não há lugares para todos');
          return redirect()->back();
        }

        $validatedData = $request->validate(
          [
            'date_trip'=>'required|date',
            'way_id'=>'required|integer',
            'cred_card_number'=>'|max:20',
            'type_pay' => 'required',
            'cost' =>'required|numeric',
          ]);
          $o=new Order;
          $o->date_trip = $request->date_trip;
          $o->user_id = Auth::User()->id;
          $o->cost = $request->cost;
          $o->way_id = $request->way_id;
          $o->type_pay = $request->type_pay;
          if($o->type_pay == "credito"){
            $o->cred_card_number=$request->cred_card_number;
          }


          $save=$o->save();
        //  echo $o->id;
        if(!$save){
            session()->flash('mensagem1','Pagamento não aceito, tente novamente!');
            return redirect()->back();
          }else{
            //verificar número da ordem
            /*$order=Order::orderBy('id')->whereRaw('way_id = ? and date_trip = ? and type_pay = ? and cost = ? and user_id = ?',
            [$request->way_id,$request->date_trip,$request->type_pay,$request->cost,Auth::User()->id])->latest()
                ->first();
                $order_id=$order->id;*/

                session(['acao' => 'escolher_poltrona','order_id'=>$o->id,'passenger'=>$request->passenger]);
            session()->forget('way_id');

            session()->flash('mensagem','Pagamento aceito!');
            return redirect("/efetuarcompra/$request->way_id/$request->passenger/$request->date_trip/$o->id")->with('categories',$categories);
          }

      }else{
        return abort(403,'Operação não permitida!');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
