@extends('base_view')
@section('navigation_part')
  @include('admin.navigation')
@endsection
@section('content_part')

<div>
  <div class="row">
    <div class="col-1">
      <img class="perfil" src="{{url('storage/companies/'.$company->image_company)}}" alt="{{$company->name}}">
    </div>
    <div class="col-11">
      <h1>{{$company->name}}</h1>
      <h5>Bem Vindo(a), {{Auth::User()->username}}!</h5>
    </div>
  </div>


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
    <div class="container len">
      <div>
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
    @if($nav==7)
      @include('admin.routes')
    @endif
    @if($nav==8)
      @include('admin.define_routes')
    @endif
    @if($nav==9)
      @include('admin.edit_way')
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
