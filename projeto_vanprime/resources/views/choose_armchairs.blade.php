@extends('base_view')
@section('navigation_part')
  @include('navigation')
@endsection
@section('content_part')


  <div class="container len1">
    <div class="well">
      <h4>Cliente - X</h4>
      <h5>Empresa: {{$vehicle->company->name}}</h5>
      <h5>Partida: {{$way->timetable}}</h5>
      <h5>Embarque: {{$way->departure_city}} - Desembarque: {{$way->stop_city}}</h5>
      <br>
      <br>
    </div>


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
        $chairs[]="/areacliente/veiculos/addpoltrona/$way->id/$date_trip/$s";
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
    echo "<input type='button' value='Voltar' class='btn btn-success box_style' onclick='location.href = history.go(-1);'>";
    ?>
  </div>

  @endsection
