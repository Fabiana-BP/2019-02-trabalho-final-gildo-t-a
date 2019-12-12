@extends('base_view')
@section('navigation_part')
  @include('admin.navigation')
@endsection
@section('content_part')
<div class="container">
  <h2>Deseja realmente excluir esta rota?</h2>
  <form name="form_delete" method="POST" action="/areaempresa/rotas/deletarrota/{{$way->id}}">
    @csrf
    @method('DELETE')
    <a class="btn btn-primary" href="/areaempresa/rotas/{{$way->vehicle->id}}">Não</a>
    <input class="btn btn-danger" type="submit" value="Sim">
  </form>
</div>
@endsection
