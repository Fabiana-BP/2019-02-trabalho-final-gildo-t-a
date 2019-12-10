@extends('base_view')
@section('navigation_part')
  @include('navigation')
@endsection
@section('content_part')
<div class="container spinner-border-sm len">
  <form action="{{route('poltronas.store')}}" method="POST">
    @csrf
    <input type="hidden" name="way_id" value="{{$way_id}}">

    <div class="form-group">
      <label id="label1" for="date_trip">Data da viagem:</label>
      <input type="text" name="date_trip" value="{{$date_trip}}" disabled>
    </div>

    <div class="form-group">
      <label id="label2" for="passenger">Número de passageiros:</label>
      <input type="text" class="form-control" id="passenger" value="{{$passenger}}"  name="passenger">
    </div>

    <div class="form-group">
      <label id="label2" for="cost">Valor:</label>
      <input type="text" class="form-control" id="cost"  name="cost">
    </div>

    <div class="container form-group">
          <label id="label1" for="type_pay">Tipo de Pagamento:</label>
          <select id="type_pay" class="custom-select form-control box_style" name="type_pay" oninput="validarProtocolar('subject_id','alerta1','label1')">
            <option class="form-control" value="0" disabled selected>Selecione</option>
            <option class="form-control" value="boleto">Boleto</option>
            <option class="form-control" value="credito">Cartão de crédito</option>
          </select>
        </div>

    <div class="form-group" style="display:none">
      <label id="label1" for="cred_card_number">Número do Cartão de Crédito</label>
      <input type="text" class="form-control" id="cred_card_number" placeholder="Número do cartão de crédito (apenas números)"
       name="cred_card_number" oninput="validateRegisterCompany('name','label1')" >
    </div>






    @if(isset($errors) && count($errors)>0)
          <div class="form-group">
            <div id="alerta1" class="alert alert-danger" style="display: block">
              <span>Não foi possível efetuar pagamento. Por favor, tente mais tarde!</span>
            </div>
          </div>
        @endif
    <div class="alert alert-danger container">
      <span>Adicionar poltrona?</span>
    </div>
    <div class="row">
      <div class="col">
        <input type="button" class="btn btn-primary submits" value="Voltar" onclick="location.href = history.go(-1);">
      </div>
      <div class="col">
        <button type="submit" class="btn btn-success submits">Adicionar</button>
      </div>
    </div>

  </form>
</div>
  @endsection
