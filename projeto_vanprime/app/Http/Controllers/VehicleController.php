<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories=Category::orderBy('title')->get();
      $vehicles=Vehicle::orderBy('board')->get();
      $nav=2;
      return view('admin.index',['categories'=>$categories,'nav'=>$nav,'vehicles'=>$vehicles]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories=Category::orderBy('title')->get();
      $nav=1;
      return view('admin.index',['categories'=>$categories,'nav'=>$nav]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      //validação
      $validatedData = $request->validate(
[
      'board'=>'required|min:7|max:7|unique:vehicles',
      'category_id'=>'required|integer',
      'max_seats'=>'required|integer',
    ]);
    //dd($request);
    //gravar
    Vehicle::create($request->all());
    $categories=Category::orderBy('title')->get();

    $nav=3;
    //dd($request);
    return redirect()->route('veiculos.create',['nav'=>$nav,'categories'=>$categories]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {

      //echo $vehicle;
      $categories=Category::orderBy('title')->get();
      $nav=3;
      return view('admin.index',compact('categories','nav','vehicle'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $vehicle = Vehicle::find($id);
      $categories=Category::orderBy('title')->get();
      $nav=4;
      return view('admin.index',['categories'=>$categories,'nav'=>$nav,'vehicle'=>$vehicle]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
      //validação
      //validação
      dd($request);

      /*$validatedData = $request->validate(
      ['board'=>'required|min:7|max:7|unique:vehicles',
      'category_id'=>'required|integer',
      'max_seats'=>'required|integer',
      ]);
      //falta buscar dado da empresa logada
      $vehicle->fill($request->all());//atualiza
      $vehicle->save();//persiste no bd
      session()->flash('mensagem','Veículo Atualizado com Sucesso!');
      $categories=Category::orderBy('title')->get();
      $vehicles=Vehicle::orderBy('board')->get();
      $nav=2;
      return view('admin.index',['categories'=>$categories,'nav'=>$nav,'vehicles'=>$vehicles]);*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
}
