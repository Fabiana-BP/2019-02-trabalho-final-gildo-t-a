<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Company;
use App\Way;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PrincipalController extends Controller
{

  public function autenticarcodigo(){
    return view('auth.enter_code');
  }

  public function verificacodigo(Request $request){
    //mandar e-mail com código aleatório
    $code=session()->pull('random', []);
    if($request->code == $code){
      session(['codeok' => 'codeok']);
      redirect('/home');
    }else{
      redirect()->back();
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
