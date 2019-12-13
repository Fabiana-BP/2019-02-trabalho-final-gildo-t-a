<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Company;
use App\Way;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\mailLogin;

class PrincipalController extends Controller
{

  public function autenticarcodigo(){
    Mail::to(Auth::User()->email)->send(new mailLogin());
    return view('auth.enter_code');
  }

  public function verificacodigo(Request $request){
    //mandar e-mail com código aleatório
    $code=session('random');
  //session(['logado','logado']);
    if($request->code == $code){
       session()->forget('random');
       //session()->forget('send');
       session(['logado','logado']);
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
      }else{
        //  echo "teste";
        //dd(session()->all());
        if(session()->has('function') && session('function')=='max_seats'){//ia fazer compra
          session()->forget('function');
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
        }
          $sources=Way::orderBy('departure_city')->select('departure_city')->distinct()->get();
          $destinations=Way::orderBy('stop_city')->select('stop_city')->distinct()->get();
          //echo $sources;
          $companies=Company::orderBy('name')->get();
          $categories=Category::orderBy('title')->get();
          return view('index',['categories'=>$categories,'companies'=>$companies,'sources'=>$sources,'destinations'=>$destinations]);

      }

    }else{
     return redirect('/home');
    }
  }

  public function bepartner(){
    $sources=Way::orderBy('departure_city')->select('departure_city')->distinct()->get();
    $destinations=Way::orderBy('stop_city')->select('stop_city')->distinct()->get();
    //echo $sources;
    $companies=Company::orderBy('name')->get();
    return view('be_a_partner',['sources'=>$sources,'destinations'=>$destinations,'companies'=>$companies]);
  }

  public function whoweare(){
    $sources=Way::orderBy('departure_city')->select('departure_city')->distinct()->get();
    $destinations=Way::orderBy('stop_city')->select('stop_city')->distinct()->get();
    //echo $sources;
    $companies=Company::orderBy('name')->get();
    return view('who_we_are',['sources'=>$sources,'destinations'=>$destinations,'companies'=>$companies]);
  }

  public function showcities(){
    $categories=Category::orderBy('title')->get();
    $sources=Way::orderBy('departure_city')->select('departure_city')->distinct()->get();
    $destinations=Way::orderBy('stop_city')->select('stop_city')->distinct()->get();
    //echo $sources;
    $companies=Company::orderBy('name')->get();
    $nocustomers=DB::table('nocustomers')
    ->join('ways','ways.id','=','nocustomers.way_id')
    ->select((DB::raw('count(ways.id)')),'ways.stop_city')
    ->groupBy('ways.stop_city')
    ->orderBy('ways.stop_city','asc')
    ->distinct()
    ->take(5)
    ->get();
     return view('most_visited_cities',['categories'=>$categories, 'nocustomers'=>$nocustomers,
     'companies'=>$companies,'sources'=>$sources,'destinations'=>$destinations]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
