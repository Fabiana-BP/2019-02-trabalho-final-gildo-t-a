<?php

namespace App\Http\Controllers;

use App\Armchair;
use App\Vehicle;
use App\Category;
use App\Way;
use App\Nocustomer;
use App\Passenger;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuxiliarclientController extends Controller
{

  public function __construct(){
      $this->middleware('auth');

    }

  public function createseat($way_id,$date_trip,$seat,$order_id){
    if(Auth::User()->user_role == "client"){
      $categories=Category::orderBy('title')->get();


      //incluir usuário
      return view('comprar.add_order',compact('way_id','date_trip','seat','categories','order_id'));
    }else{
      return abort(403,'Operação não permitida!');
    }
  }


  public function proof_payment($way_id,$date_trip,$order_id){
      if(Auth::User()->user_role == "client"){
        $categories=Category::orderBy('title')->get();
        $order=Order::find($order_id);
        $way=Way::find($way_id);
        $passengers=Passenger::orderBy('nome')->where('order_id','=',$order_id)->get();
        return view('comprar.proof_payment',['order'=>$order, 'way'=>$way, 'passengers'=>$passengers,'categories'=>$categories]);
      }else{
        return abort(403,'Operação não permitida!');
      }
  }


}
