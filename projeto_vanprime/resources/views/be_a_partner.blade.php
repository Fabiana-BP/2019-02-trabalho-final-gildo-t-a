@extends('base_view')
@section('navigation_part')
  @include('navigation')
@endsection
@section('content_part')

<div class="len1">
    <div class="row">
      <div class="container col-8">
        <div class="form-group container">
          <h1>Vem fazer parte do nosso time!<h1>
        </div>
        <div class="form-group container">
          <h3><h2><strong>Não</strong>
          </h3> cobramos <h3><strong>taxa</strong></h3> para sua empresa ter cadastro no website, apenas cobramos <h3>
            <strong> 1%</strong></h3> a mais do preço para o cliente.<h4>
        </div>
        <div class="form-group container">
          <a class="btn btn-success btn-lg" href="{{route('cadastro.create')}}">Cadastre-se</a>
        </div>

      </div>
      <div class="col-md-4 diferent_container1">
        @include('search')
      </div>

    </div>
</div>

<hr>
@endsection
