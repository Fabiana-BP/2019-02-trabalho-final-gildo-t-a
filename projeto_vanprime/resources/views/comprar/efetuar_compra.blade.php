@extends('base_view')
@section('navigation_part')
  @include('navigation')
@endsection
@section('content_part')
<div class="container len1">
  <form action="/efetuarcompra/pagar" method="POST">
    @csrf
    <input type="hidden" name="way_id" value="{{$way_id}}">

    <h3><strong>{{Auth::User()->name}},</strong><h3>
      <h4>Por favor confirme o número de passageiros e a forma de pagamento. </h4>

      <div class="form-group">
        <label id="label1" for="price">Valor unitário:</label>
        <input type="text" id="price" class="form-control" name="price" value="{{$price}}" readonly>
      </div>

    <div class="form-group">
      <label id="label2" for="date_trip">Data da viagem:</label>
      <input type="text" class="form-control" name="date_trip" value="{{date("d/m/Y", strtotime($date_trip))}}" readonly>
    </div>
      <input type="hidden" class="form-control" name="date_trip" value="{{$date_trip}}">


    <div class="form-group">
      <label id="label3" for="passenger">Número de passageiros:</label>
      <input type="text" class="form-control" id="passenger" value="{{$passenger}}" oninput="calculaValor()" name="passenger" >
    </div>

    <div class="form-group">
      <label id="label4" for="cost">Valor a pagar:</label>
      <input type="text" class="form-control" id="cost" value="{{$cost}}" name="cost" readonly>
    </div>


    <div class="form-group">
          <label id="label5" for="type_pay">Tipo de Pagamento:</label>
          <select id="type_pay" class="custom-select form-control box_style" name="type_pay" oninput="verificaTipoPagamento()">
            <option class="form-control" value="0" disabled selected>Selecione</option>
            <option class="form-control" value="boleto">Boleto</option>
            <option class="form-control" value="credito">Cartão de crédito</option>
          </select>
        </div>


    <div id="cred" class="form-group" style="display:none">
      <label id="label6" for="cred_card_number">Número do Cartão de Crédito</label>
      <input type="text" class="form-control" id="cred_card_number" value="" placeholder="Número do cartão de crédito (apenas números)"
       name="cred_card_number" >
    </div>


    @if(isset($errors) && count($errors)>0)
          <div class="form-group">
            <div id="alerta1" class="alert alert-danger" style="display: block">
              <span>Por favor, insira valores válidos</span>
            </div>
          </div>
        @endif

    <div class="row">
      <div class="col">
        <a class="btn btn-primary submits" href="/home">Voltar</a>
      </div>
      <div class="col">
        <button type="submit" class="btn btn-success submits">Pagar</button>
      </div>
    </div>

  </form>
</div>
  @endsection
