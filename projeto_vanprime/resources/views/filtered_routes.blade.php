@extends('base_view')
@section('navigation_part')
  @include('navigation')
@endsection
@section('content_part')

<div class="diferent_container1">
<?php

 foreach ($filtered_way as $fi) {
   echo "<div class='well len'>";
     echo "<form >";
       echo "<div class='row'>";
        echo "<div class='col'>";
          echo "<input id= 'source' name='source' type='text' class='form-control box_style' placeholder='Origem' value='$fi->first_city'>";
         echo "</div>";
         echo "<div class='col'>";
           echo "<input id='destination' name='destination' type='text' class='form-control box_style' placeholder='Destino' value='$fi->last_city'>";
         echo "</div>";
         echo "<div class='col'>";
          echo "<input id='date_trip' name='date_trip' type='date' value='$date' min=";
          echo date('Y-m-d');
          echo "max=";
          echo date('Y-m-d', strtotime(date('Y-m-d'). ' + 29 days'));
          echo "name='date' class='form-control box_style' id='date' placeholder='dd/mm/yyyy'>";
         echo "</div>";
         echo "<div class='col'>";
          echo "<input id='passenger' type='number' name='passenger'value='$passenger' placeholder='Passageiros' class='form-control box_style'>";
         echo "</div>";
         echo "<div class='col'>";
         echo "<input type='button' class='btn btn-primary box_style'  value='Buscar' onclick='search_routes()'>";
         echo "</div>
       </div>
     </form>
   </div>";
   break;
 }
   ?>

</div>
<?php
echo "<table class='table table-bordered table-hover table-striped'>";
echo "<thead class='thead-light'>";
echo "<tr>";
echo "<th>Empresa</th>";
echo "<th>Partida</th>";
echo "<th>Embarque / Desembarque</th>";
echo "<th>Passagens restantes</th>";
echo "<th>Preço</th>";
echo "<th>Preço com desconto</th>";
echo "<th> </th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
  foreach ($filtered_way as $f) {

    echo "<tr>";
    $wayid=$f->ways_id;
    $pass_rest=$f->max_seats - $f->available_seats;
    $price_discount=$f->price - ($f->price * $f->discount);
    if($pass_rest>=$passenger){
      echo "<td>$f->cname</td>";
      echo "<td>$f->timetable</td>";
      echo "<td>$f->first_city / $f->last_city</td>";
      if($f->date_reserved == $date){
        echo "<td>$pass_rest</td>";
      }else{
        echo "<td>$f->max_seats</td>";
      }
      echo "<td>$f->price</td>";
      echo "<td>$price_discount</td>";
      $way_id=$fi->ways_id;
      echo "<td><a class='btn btn-primary box_style' href='/efetuarcompra/$way_id/$passenger/$date'>Comprar</a></td>";
    }

    echo "</tr>";

  }
  echo "</tbody>";
echo "</table>";

 ?>
<hr>
@endsection
