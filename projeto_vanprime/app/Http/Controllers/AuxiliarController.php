<?php

namespace App\Http\Controllers;

use App\Armchair;
use App\Vehicle;
use App\Category;
use App\Way;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuxiliarController extends Controller
{

  public function show($id)
  {
    $vehicle=Vehicle::find($id);
    $nav=5;
    $categories=Category::orderBy('title')->get();
    $ways=Way::orderBy('departure_city')->where('vehicle_id','=',$id)->get();
    return view('admin.index',compact('nav','vehicle','categories','ways'));
  }

  public function searcharmchairs(Request $request)
  {
    //dd($request);
    $date_trip=$request->date_trip;
    $way_id=$request->way_id;
    $vehicle=Vehicle::orderBy('board')->where('board','=',$request->board)->first();
    $ways=Way::orderBy('departure_city')->where('vehicle_id','=',$vehicle->id)->get();
      $armchairs=DB::table('orders')->selectRaw('date_trip = ? and ways.id = ? ',[$date_trip,$way_id])
              ->join('ways','ways.id','=','orders.way_id')
              ->join('passengers','passengers.order_id','=','orders.id')
              ->select('passengers.seat as seats')->get();
      $nav=6;
      $categories=Category::orderBy('title')->get();
      return view('admin.index',['armchairs'=>$armchairs,'nav'=>$nav,'categories'=>$categories,
       'ways'=>$ways,'vehicle'=>$vehicle,'date_trip'=>$date_trip,'way_id'=>$way_id]);
  }
}
