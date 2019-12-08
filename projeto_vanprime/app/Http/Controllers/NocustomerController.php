<?php

namespace App\Http\Controllers;

use App\Nocustomer;
use App\Armchair;
use Illuminate\Http\Request;

class NocustomerController extends Controller
{
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
      //validação
      //dd($request);
        $validatedData = $request->validate(
          [
            'date_trip'=>'required|date',
            'seat'=>'required|integer',
            'way_id'=>'required|integer',
          ]);

          //gravar tabela nocustomers
          Nocustomer::create($request->all());
          session()->flash('mensagem','Poltrona inserida com Sucesso!');

          return redirect("/areaempresa/veiculos/$request->date_trip/$request->way_id");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nocustomer  $nocustomer
     * @return \Illuminate\Http\Response
     */
    public function show(Nocustomer $nocustomer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nocustomer  $nocustomer
     * @return \Illuminate\Http\Response
     */
    public function edit(Nocustomer $nocustomer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nocustomer  $nocustomer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nocustomer $nocustomer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nocustomer  $nocustomer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nocustomer $nocustomer)
    {
        //
    }
}
