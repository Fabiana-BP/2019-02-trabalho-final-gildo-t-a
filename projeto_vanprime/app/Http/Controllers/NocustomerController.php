<?php

namespace App\Http\Controllers;

use App\Nocustomer;
use App\Armchair;
use Illuminate\Http\Request;
use App\Order;
use App\Passenger;
use Illuminate\Support\Facades\Auth;

class NocustomerController extends Controller
{
  public function __construct(){
    $this->middleware('auth');

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

          if(Auth::user()->user_role == "company"){
            session()->flash('mensagem','Poltrona inserida com Sucesso!');

            return redirect("/areaempresa/veiculos/$request->date_trip/$request->way_id");
        }else{
          $validatedData = $request->validate(
            [
              'nome'=>'required|String',
              'seat'=>'required|integer',
              'age'=>'required|integer',
              'order_id'=>'required|integer',
            ]);

            //gravar tabela nocustomers
            Passenger::create($request->all());
            session()->flash('mensagem','Poltrona selecionada com Sucesso!');

            //verificar se o número de passagens confere com a ordem permitida
            $passengerOrder=Passenger::orderBy('id')->where('order_id','=',$request->order_id)->count();
            $passengerMax=session('passenger');
          //  echo "ja feitos: $passengerOrder     maximo= $passengerMax";
          //  $ok=$passengerOrder<$passengerMax;
          //  echo $ok;

            if($passengerOrder<$passengerMax){//comprovante de pagamento
              return redirect("/efetuarcompra/$request->way_id/$passengerMax/$request->date_trip/$request->order_id");

            }else{//tem mais para escolher
              return redirect("/areacliente/comprovante/$request->way_id/$request->date_trip/$request->order_id");
            }
        }
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
