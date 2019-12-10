@extends('base_view')
@section('navigation_part')
  @include('navigation')
@endsection
@section('content_part')

<!--verificar se variáveis são nulas-->

@if(!isset($way,$vehicle,$armchairs))
    <script>location.href = history.go(-1);</script>
@endif


  <div class="container len1">
    <div class="well">
      <h4>{{Auth::user()->name}}</h4>
      <h5>Empresa: {{$vehicle->company->name}}</h5>
      <h5>Partida: {{$way->timetable}}</h5>
      <h5>Embarque: {{$way->departure_city}} - Desembarque: {{$way->stop_city}}</h5>
    </div>
    <br>

    <div class="form-group">
      <p>Escolhas as  poltronas desejadas:</p>
    </div>
  <?php
    //preencher poltronas

    echo "<div class='container len form-group'>";

      $chairs=array();
      $styles=array();

      $cont=0;
      while($cont < $vehicle->max_seats){
        $s=$cont+1;
        $chairs[]="/areacliente/veiculos/addpoltrona/$way->id/$date_trip/$s/$order_id";
        $styles[]="btn btn-light form-control";
        $cont=$cont+1;
      }

      foreach ($armchairs as $s) {
        $i=$s->seat - 1;
        $chairs[$i]="#";
        $styles[$i]="form-control btn btn-primary ";
      }


      $cont=0;
      $aux=1;
      $aux1=0;
      while($cont < $vehicle->max_seats){
        echo "<div class='row'>";
          echo "<div class='col-1'>";
            echo "<a class='$styles[$aux1]' href='$chairs[$aux1]'>$aux</a>";
          echo "</div>";
        $cont=$cont+1;
        $aux=$aux+1;
        $aux1=$aux1+1;
        if($cont < $vehicle->max_seats){
          echo "<div class='col-1'>";
            echo "<a class='$styles[$aux1]' href='$chairs[$aux1]'>$aux</a>";
          echo "</div>";
        }
        $cont=$cont+1;
        $aux=$aux+2;
        $aux1=$aux1+2;
        echo "<div class='col-2'>";
        echo "</div>";

        if($cont < $vehicle->max_seats){
          echo "<div class='col-1'>";
            echo "<a class='$styles[$aux1]' href='$chairs[$aux1]'>$aux</a>";
          echo "</div>";
        }
        $cont=$cont+1;
        $aux=$aux-1;
        $aux1=$aux1-1;
        if($cont < $vehicle->max_seats){
          echo "<div class='col-1'>";
            echo "<a class='$styles[$aux1]' href='$chairs[$aux1]'>$aux</a>";
          echo "</div>";
        }
        $cont=$cont+1;
        $aux=$aux+2;
        $aux1=$aux1+2;
        echo "</div>";

    }

    echo "</div>";
    session()->forget('function');
    ?>
  </div>

  @endsection
