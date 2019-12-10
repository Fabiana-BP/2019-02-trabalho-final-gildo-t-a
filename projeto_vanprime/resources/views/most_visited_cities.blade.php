@extends('base_view')
@section('navigation_part')
  @include('navigation')
@endsection
@section('content_part')
<div class="container len1">
  <div>
    <div class="row">
      <div class="col-4">
        <img class="perfil" src="img/desenho-mapa-mundi.jpg" alt="desenho de mapa">
      </div>
      <div class="col-8">
        <h1 class="diferent_container1">Cidades mais visitadas</h1>

        <table class="table table-hover">

            <tbody>
              <?php $i=0; ?>
              @foreach ($nocustomers as $n)
              <tr>
                <td>{{$n->stop_city}}</td>
              </tr>
              <?php $i=$i+1; ?>
              @endforeach
            </tbody>

        </table>
      </div>
    </div>

  </div>


</div>
@endsection
