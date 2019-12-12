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
      @include('admin.report.customers_review')
    @endif
    @if($nav==2)
      @include('admin.report.total_sales')
    @endif




  </div>
  <div class="col-md-2 diferent_container1">
    <h5><strong>Perfil</strong></h5>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" style="color:black" href="/areaempresa/relatorios/avaliacoes">Avaliações de Usuários</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" style="color:black" href="/areaempresa/relatorios/vendas">Vendas Totais </a>
      </li>
    </ul>
  </div>
</div>
<hr>
@endsection
