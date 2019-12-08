@extends('base_view')
@section('navigation_part')
  @include('navigation')
@endsection
@section('content_part')
<div class="container len">
  <form action="{{route('poltronas.store')}}" method="POST">
    @csrf
    <input type="hidden" name="way_id" value="{{$way_id}}">
    <input type="hidden" name="date_trip" value="{{$date_trip}}">
    <input type="hidden" name="seat" value="{{$seat}}">
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
        <!--<button type="submit" class="btn btn-success submits">Adicionar</button>-->
      </div>
    </div>

  </form>
</div>
  @endsection
