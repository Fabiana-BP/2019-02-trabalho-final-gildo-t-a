<?php

namespace App\Http\Controllers;

use App\Category;
use App\Company;
use App\Way;
use Illuminate\Http\Request;
use App\Vehicle;
use App\Nocustomer;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

             $where = session()->pull('function',[]);
          if(Auth::check()){
            if(Auth::user()->user_role=='company'){
              if(empty(Auth::user()->company)){
                return view('register.register_company',['username'=>Auth::User()->username]);
              }
              $sources=Way::orderBy('departure_city')->select('departure_city')->distinct()->get();
              $destinations=Way::orderBy('stop_city')->select('stop_city')->distinct()->get();
              //echo $sources;
              $companies=Company::orderBy('name')->get();
              $categories=Category::orderBy('title')->get();
              return view('index',['categories'=>$categories,'companies'=>$companies,'sources'=>$sources,'destinations'=>$destinations]);
              /*
              $nav=2;
              $company=Company::find(Auth::User()->company);
              $categories=Category::orderBy('title')->get();
              $vehicles=Vehicle::orderBy('board')->where('company_id','=',Auth::User()->company)->get();
              return view('admin.index',['company'=>$company,'nav'=>$nav,'vehicles'=>$vehicles]);*/
            }else{
            //  echo "teste";
             //dd(session()->all());
              if($where=='max_seats'){//ia fazer compra
                //variaveis recuperadas da sessão
                $way_id=session()->pull('way_id',[]);
                $date=session()->pull('date',[]);
                $passenger=session()->pull('passenger',[]);
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
            }
          }else{
            $sources=Way::orderBy('departure_city')->select('departure_city')->distinct()->get();
            $destinations=Way::orderBy('stop_city')->select('stop_city')->distinct()->get();
            //echo $sources;
            $companies=Company::orderBy('name')->get();
            $categories=Category::orderBy('title')->get();
            return view('index',['categories'=>$categories,'companies'=>$companies,'sources'=>$sources,'destinations'=>$destinations]);
          }



      $sources=Way::orderBy('departure_city')->select('departure_city')->distinct()->get();
      $destinations=Way::orderBy('stop_city')->select('stop_city')->distinct()->get();
      //echo $sources;
      $companies=Company::orderBy('name')->get();
      $categories=Category::orderBy('title')->get();
      return view('index',['categories'=>$categories,'companies'=>$companies,'sources'=>$sources,'destinations'=>$destinations]);
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
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
