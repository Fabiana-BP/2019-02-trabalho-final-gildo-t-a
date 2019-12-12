@extends('base_view')
@section('navigation_part')
  @include('navigation')
@endsection
@section('content_part')


      <div class="diferent_container">
        <div class="row">
          <div class="col-4">
            @include('search')
          </div>
          <div class="col">
            <h2 style="padding-top: 16rem";>Garanta a sua passagem!!! Temos excelentes parceiros.</h5>
          </div>
      </div>

      <div>
      </div>
    </div>
    <div>
      <div class="container diferent_container1">
        <div class="well text-xl-center">
          <a style="color:black" href="/cidadesmaisvisitadas"><h4>VEJA CIDADES MAIS VISITADAS</h4></a>
        </div>
      </div>

      <div class="container diferent_container1">
        <div class="well jumbotron text-xl-center">

          <div class="row">
            <div class="col-2">
              <img src="img/carinha_feliz.jpeg">
            </div>
            <div class="col-10">
              <a style="color:black" href="#"><h4>SEJA NOSSO PARCEIRO</h4></a>
              <p>A VanPrime Transportes oferece espaço para a sua
                empresa vender passagens/reservas de ônibus.</p>
                <h5>Venha fazer parte do nosso time!</h5>
                <a class="btn btn-primary text-xl-center" href="/sejanossoparceiro">Saiba mais</a>
              </div>
            </div>
          </div>


        </div>

        <div class="well text-xl-center">
          <h4>PARCEIROS</h4>
          @include('image_companies')
        </div>

    </div>



<hr>
@endsection
