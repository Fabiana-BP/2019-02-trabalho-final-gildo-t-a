<?php

namespace App\Http\Controllers;

use App\Armchair;
use App\Vehicle;
use App\Category;
use App\Company;
use App\Way;
use App\Nocustomer;
use App\Passenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuxiliarController extends Controller
{
  public function __construct(){
    $this->middleware('auth');

  }

  public function show($id)
  {
    if(Auth::User()->user_role=="company"){
      $vehicle=Vehicle::find($id);
      $company=Company::find(Auth::User()->company);
      $nav=5;
      $categories=Category::orderBy('title')->get();
      $ways=Way::orderBy('departure_city')->where('vehicle_id','=',$id)->get();
      return view('admin.index',compact('nav','company','vehicle','categories','ways'));
    }else{
      return abort(403,'Operação não permitida!');
    }

  }

  public function searcharmchairs(Request $newrequest)
  {
    //dd($request);
    if(Auth::User()->user_role=="company"){
      $date_trip=$newrequest->date_trip;
      $way_id=$newrequest->way_id;
      $vehicle=Vehicle::orderBy('board')->where('board','=',$newrequest->board)->first();
      $ways=Way::orderBy('departure_city')->where('vehicle_id','=',$vehicle->id)->get();
      $armchairs=Nocustomer::orderBy('way_id')->whereRaw('date_trip  = ? and way_id = ?',[$date_trip,$way_id])->select('seat')->get();

      $nav=6;
      $company=Company::find(Auth::User()->company);

      return view('admin.index',['armchairs'=>$armchairs,'nav'=>$nav,'company'=>$company,
       'ways'=>$ways,'vehicle'=>$vehicle,'date_trip'=>$date_trip,'way_id'=>$way_id]);
     }else{
       return abort(403,'Operação não permitida!');
     }
  }

  public function searcharmchairsback($date_trip,$way_id)
  {
    //dd($request);
    if(Auth::User()->user_role=="company"){
      $way=Way::find($way_id);
      $vehicle=Vehicle::orderBy('board')->where('id','=',$way->vehicle->id)->first();
      $ways=Way::orderBy('departure_city')->where('vehicle_id','=',$vehicle->id)->get();
      $armchairs=Nocustomer::orderBy('way_id')->whereRaw('date_trip  = ? and way_id = ?',[$date_trip,$way_id])->select('seat')->get();
      $nav=6;
      $company=Company::find(Auth::User()->company);

      return view('admin.index',['armchairs'=>$armchairs,'nav'=>$nav,'company'=>$company,
       'ways'=>$ways,'vehicle'=>$vehicle,'date_trip'=>$date_trip,'way_id'=>$way_id]);
     }else{
       return abort(403,'Operação não permitida!');
     }
  }

  public function createseat($way_id,$date_trip,$seat){
    if(Auth::User()->user_role=="company"){
      $company=Company::find(Auth::User()->company);
      return view('admin.add_order',compact('way_id','date_trip','seat','company'));
    }else{
        return abort(403,'Operação não permitida!');
      }
  }

 public function totalvendas(){
   if(Auth::User()->user_role=="company"){
     $company=Company::find(Auth::User()->company);
     $nav=2;
     $nocustomers=DB::table('nocustomers')->where('vehicles.company_id','=',$company->id)
     ->join('ways','ways.id','=','nocustomers.way_id')
     ->join('vehicles','vehicles.id','=','ways.vehicle_id')
     ->select('ways.departure_city as departure_city','ways.stop_city as stop_city','ways.timetable as timetable',
     'ways.id as way_id', (DB::raw('count(nocustomers.id) as count')))
     ->groupBy('ways.id')
     ->distinct()
     ->get();
     $passengers=DB::table('passengers')->where('vehicles.company_id','=',$company->id)
      ->join('orders','orders.id','=','passengers.order_id')
      ->join('ways','ways.id','=','orders.way_id')
      ->join('vehicles','vehicles.id','=','ways.vehicle_id')
      ->select('ways.departure_city as departure_city','ways.stop_city as stop_city','ways.timetable as timetable',
      'ways.id as way_id', (DB::raw('count(passengers.id) as count')))
      ->groupBy('ways.id')
      ->distinct()
      ->get();

      return view('admin.index_report',['nav'=>$nav,'company'=>$company,'nocustomers'=>$nocustomers,'passengers'=>$passengers]);
   }else{
     return abort(403,'Operação não permitida!');
   }
 }

}
