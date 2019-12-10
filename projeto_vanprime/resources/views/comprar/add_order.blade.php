@extends('base_view')
@section('navigation_part')
  @include('navigation')
@endsection
@section('content_part')

<!--verificar se variáveis são nulas-->

@if(!isset($way_id,$date_trip,$seat,$order_id))
    <script>location.href = history.go(-1);</script>
@endif


<div class="container len1">
  <form action="{{route('poltronas.store')}}" method="POST">
    @csrf
    <input type="hidden" name="way_id" value="{{$way_id}}">
    <input type="hidden" name="date_trip" value="{{$date_trip}}">
    <input type="hidden" name="seat" value="{{$seat}}">
    <input type="hidden" name="order_id" value="{{$order_id}}">
    <h4>Data da viagem: {{$date_trip}}</h4>
    <h4>Assento: {{$seat}}</h4>

    <div class="form-group">
      <label id="label1" for="nome">Nome do Passageiro:</label>
      <input type="text" class="form-control" id="nome" placeholder="Nome do Passageiro" name="nome" oninput="validateRegisterCompany('name','label1')" >
    </div>



    <div class="form-group">
      <label id="label2" for="age">Idade:</label>
      <input type="number" class="form-control" id="age" placeholder="idade" name="age">
    </div>


    @if(isset($errors) && count($errors)>0)
          <div class="form-group">
            <div id="alerta1" class="alert alert-danger" style="display: block">
              <span>Não foi possível adicionar a poltrona. Por favor, tente mais tarde!</span>
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
