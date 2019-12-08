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

class AuxiliarclientController extends Controller
{



  public function createseat($way_id,$date_trip,$seat){
    $categories=Category::orderBy('title')->get();
    //incluir usuário
    return view('add_order',compact('way_id','date_trip','seat','categories'));

  }


}
