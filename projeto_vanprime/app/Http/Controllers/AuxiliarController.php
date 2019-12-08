<?php

namespace App\Http\Controllers;

use App\Armchair;
use App\Vehicle;
use App\Category;
use App\Way;
use App\Nocustomer;
use App\Passenger;
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

  public function searcharmchairs(Request $newrequest)
  {
    //dd($request);
    $date_trip=$newrequest->date_trip;
    $way_id=$newrequest->way_id;
    $vehicle=Vehicle::orderBy('board')->where('board','=',$newrequest->board)->first();
    $ways=Way::orderBy('departure_city')->where('vehicle_id','=',$vehicle->id)->get();
      $armchairs=Nocustomer::orderBy('way_id')->whereRaw('date_trip  = ? and way_id = ?',[$date_trip,$way_id])->select('seat')->get();

      $nav=6;
      $categories=Category::orderBy('title')->get();

      return view('admin.index',['armchairs'=>$armchairs,'nav'=>$nav,'categories'=>$categories,
       'ways'=>$ways,'vehicle'=>$vehicle,'date_trip'=>$date_trip,'way_id'=>$way_id]);
  }

  public function searcharmchairsback($date_trip,$way_id)
  {
    //dd($request);
    $way=Way::find($way_id);
    $vehicle=Vehicle::orderBy('board')->where('id','=',$way->vehicle->id)->first();
    $ways=Way::orderBy('departure_city')->where('vehicle_id','=',$vehicle->id)->get();
      $armchairs=Nocustomer::orderBy('way_id')->whereRaw('date_trip  = ? and way_id = ?',[$date_trip,$way_id])->select('seat')->get();
      $nav=6;
      $categories=Category::orderBy('title')->get();

      return view('admin.index',['armchairs'=>$armchairs,'nav'=>$nav,'categories'=>$categories,
       'ways'=>$ways,'vehicle'=>$vehicle,'date_trip'=>$date_trip,'way_id'=>$way_id]);
  }

  public function createseat($way_id,$date_trip,$seat){
    $categories=Category::orderBy('title')->get();
    return view('admin.add_order',compact('way_id','date_trip','seat','categories'));

  }


}
