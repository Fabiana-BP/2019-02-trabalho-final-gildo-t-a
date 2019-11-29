@extends('base_view')
@section('navigation_part')
  @include('navigation')
@endsection
@section('content_part')

<?php


  //preencher poltronas

  echo "<div class='container len form-group'>";

  $maxseats=0;
  $armchairs=array();
  $styles=array();
  foreach ($way as $wy) {
    $maxseats=$wy->max_seats;
    $firstcity=$wy->first;
    $lastcity=$wy->last;
    $time=$wy->time;
    $cname=$wy->company_name;
    break;
  }

  $cont=0;
  while($cont < $maxseats){
    $armchairs[]=" ";
    $styles[]="btn btn-light form-control";
    $cont=$cont+1;
  }

  foreach ($way as $wy) {
    $i=$wy->seat - 1;
    $armchairs[$i]="disabled";
    $styles[$i]="form-control btn btn-primary ";
  }
  echo "<div class='well'>";
  echo "<h5>Empresa: $cname</h5>";
  echo "<h5>Partida: $time</h5>";
  echo "<h5>Embarque: $firstcity - Desembarque: $lastcity</h5>";
  echo "</div>";
  echo "<h4>Selecione a(s) poltrona(s) desejada(s):</h4>";
  $cont=0;
  $aux=1;
  $aux1=0;
    while($cont < $maxseats){

        echo "<div class='row'>";

        echo "<div class='col-1'>";
        echo "<input class='$styles[$aux1]' type='button' value='$aux' name='$aux' id='$aux' $armchairs[$aux1]>";
        echo "</div>";
        $cont=$cont+1;
        $aux=$aux+1;
        $aux1=$aux1+1;
        if($cont < $maxseats){
          echo "<div class='col-1'>";
          echo "<input class='$styles[$aux1]' type='button' value='$aux' name='$aux' id='$aux' $armchairs[$aux1]>";
          echo "</div>";
        }
        $cont=$cont+1;
        $aux=$aux+2;
        $aux1=$aux1+2;
        echo "<div class='col-2'>";
        echo "</div>";

        if($cont < $maxseats){
          echo "<div class='col-1'>";
          echo "<input class='$styles[$aux1]' type='button' value='$aux' name='$aux' id='$aux' $armchairs[$aux1]>";
          echo "</div>";
        }
        $cont=$cont+1;
        $aux=$aux-1;
        $aux1=$aux1-1;
        if($cont < $maxseats){
          echo "<div class='col-1'>";
          echo "<input class='$styles[$aux1]' type='button' value='$aux' name='$aux' id='$aux' $armchairs[$aux1]>";
          echo "</div>";
        }
        $cont=$cont+1;
        $aux=$aux+2;
        $aux1=$aux1+2;
        echo "</div>";

    }
    echo "</div>";
 ?>
</hr>
@endsection
