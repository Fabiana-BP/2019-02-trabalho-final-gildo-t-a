@extends('base_view')
@section('navigation_part')
  @include('admin.navigation')
@endsection
@section('content_part')

<div>
  <h1>EMPRESA</h1>

  <h5>Bem Vindo usuário!</h5>
</div>
<div class="row">

  <div class="col-md-10">

    @if($nav==1)
      @include('admin.register_vehicle')
    @endif
    @if($nav==2)
      @include('admin.index_vehicle')
    @endif
    @if($nav==3)
      @include('admin.show_vehicle')
    @endif
    @if($nav==4)
    <div class="container diferent_container2 len">
      <div class="well">
          <div class="text-xl-center">
            <h2>Atualizar Veículo</h2>
          </div>
          @include('admin.edit_vehicle')
        </div>
    </div>
    @endif
    @if($nav==5)
      @include('admin.choose_date_add_seats')
    @endif
    @if($nav==6)
      @include('admin.add_seats')
    @endif

  </div>
  <div class="col-md-2 diferent_container1">
    <h5><strong>Veículos</strong></h5>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" style="color:black" href="{{route('veiculos.create')}}">Cadastrar Veículo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" style="color:black" href="{{route('veiculos.index')}}">Visualizar Veículos</a>
      </li>
    </ul>
  </div>
</div>
<hr>
@endsection
