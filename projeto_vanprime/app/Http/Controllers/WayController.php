<?php

namespace App\Http\Controllers;

use App\Way;
use App\Armchair;
use App\Vehicle;
use App\Company;
use App\Order;
use App\Passenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($first,$last,$date,$passenger)
    {

      $filtered_way = DB::table('ways')->selectRaw('departure_city = ? and stop_city = ?',[$first,$last])
            ->join('armchairs','ways.id','=','armchairs.way_id')
            ->join('vehicles','ways.vehicle_id','=','vehicles.id')
            ->join('companies','vehicles.company_id','=','companies.id')
            ->select('ways.id as ways_id','companies.name as cname','ways.departure_city as first_city','ways.stop_city as last_city','ways.timetable as timetable',
            'armchairs.max_seats as max_seats','armchairs.available_seats as available_seats',
            'ways.price as price','ways.discount as discount','armchairs.date_trip as date_reserved')
            ->get();

      //Passar dados para a view
    return view('filtered_routes',compact('filtered_way','date','passenger'));
    }

    public function max_seats($way_id,$passenger,$date){
      $way=DB::table('ways')->selectRaw('ways.id = ? and orders.date_trip = ?',[$way_id,$date])
        ->join('vehicles','vehicles.id','=','ways.vehicle_id')
        ->join('orders','orders.way_id','=','ways.id')
        ->join('passengers','passengers.order_id','=','orders.id')
        ->join('companies','vehicles.company_id','=','companies.id')
        ->select('vehicles.max_seats as max_seats','passengers.seat as seat','ways.departure_city as first',
        'ways.stop_city as last','ways.timetable as time','companies.name as company_name')
      ->get();


      return view('choose_armchairs',compact('way','passenger','date'));

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
