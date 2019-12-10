<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Vehicle;
use App\Way;
use App\Company;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

       /*$where = session()->get('function');
      if(Auth::user()->user_role=='company'){
        $nav=2;
        $categories=Category::orderBy('title')->get();
        $vehicles=Vehicle::orderBy('board')->get();
        return view('admin.index',['categories'=>$categories,'nav'=>$nav,'vehicles'=>$vehicles]);
      }else{
        echo "teste";
      /*  dd(session()->all());
        if($where=='max_seats'){//ia fazer compra
          //variaveis recuperadas da sessão
          $way_id=session()->get('way_id');
          $date=session()->get('date');
          $passenger=session()->get('passenger');
          //voltando para página para selecionar poltronas
          $way=Way::find($way_id);
          $vehicle=Vehicle::orderBy('board')->where('id','=',$way->vehicle->id)->first();
          $ways=Way::orderBy('departure_city')->where('vehicle_id','=',$vehicle->id)->get();
          $armchairs=Nocustomer::orderBy('way_id')->whereRaw('date_trip  = ? and way_id = ?',[$date,$way_id])->select('seat')->get();
          $nav=6;
          $categories=Category::orderBy('title')->get();
          return view('choose_armchairs',['armchairs'=>$armchairs,'categories'=>$categories,'vehicle'=>$vehicle,
          'ways'=>$ways,'date_trip'=>$date,'way'=>$way,'passenger'=>$passenger]);
        }else{
          $sources=Way::orderBy('departure_city')->select('departure_city')->distinct()->get();
          $destinations=Way::orderBy('stop_city')->select('stop_city')->distinct()->get();
          //echo $sources;
          $companies=Company::orderBy('name')->get();
          $categories=Category::orderBy('title')->get();
          return view('index',['categories'=>$categories,'companies'=>$companies,'sources'=>$sources,'destinations'=>$destinations]);
        }
      }*/
    }
}
