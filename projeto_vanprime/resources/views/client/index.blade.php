@extends('base_view')
@section('navigation_part')
  @include('navigation')
@endsection
@section('content_part')

<div class="len">
<div class="container row">
  <div class="col-1">
    <div class="form-group">
      <img class="perfil" src="{{url('storage/profiles/'.Auth::User()->image_user)}}" alt="{{Auth::User()->username}}">
    </div>
  </div>
  <div class="col-11">
    <h3>Bem Vindo(a) {{Auth::User()->username}}!</h3>
  </div>
</div>
</div>
<div class="row">

  <div class="col-md-10">

    @if($nav==1)
      @include('client.show_profile')
    @endif
    @if($nav==2)
      @include('client.edit_profile')
    @endif
    @if($nav==3)
      @include('client.my_shopping')
    @endif
    @if($nav==4)
      @include('client.evaluate_company')
    @endif
    @if($nav==5)
      @include('client.my_evaluate')
    @endif
    @if($nav==6)
      @include('client.update_evaluate_company')
    @endif

  </div>
  <div class="col-md-2 diferent_container1 container">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" style="color:black" href="/areacliente/perfil">Visualizar Perfil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" style="color:black" href="{{route('perfil.edit',Auth::User()->id)}}">Editar Perfil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" style="color:black" href="/areacliente/minhascompras">Minhas Compras</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" style="color:black" href="/areacliente/minhasavaliacoes">Minhas Avaliações</a>
      </li>
    </ul>
  </div>
</div>
</div>
<hr>

@endsection
