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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Way $way)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Way  $way
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Way $way)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Way  $way
     * @return \Illuminate\Http\Response
     */
    public function destroy(Way $way)
    {
        //
    }
}
