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
          echo "<label id='label1'  class='form-check box_style' for='source'>Origem:</label>";
          echo "<select id='source' class='custom-select form-control box_style' name='source'>";
          echo "<option class='form-control' value='0' disabled selected>Selecione</option>";
          foreach ($sources as $s){
            $slt="";
            if($fi->first_city==$s->departure_city){
              $slt="selected";
            }
            echo "<option class='form-control' $slt value='$s->departure_city'>$s->departure_city</option>";
            $slt="";
          }
          echo "</select>";
         echo "</div>";
         echo "<div class='col'>";
         echo "<label id='label2'  class='form-check box_style' for='destination'>Destino:</label>";
           echo "<select id='destination' class='custom-select form-control box_style' name='destination'>";
           echo "<option class='form-control' value='0' disabled selected>Selecione</option>";
           foreach ($destinations as $s){
             $slt="";
             if($fi->last_city==$s->stop_city){
               $slt="selected";
             }
             echo "<option class='form-control' $slt value='$s->stop_city'>$s->stop_city</option>";
           }
           echo "</select>";
         echo "</div>";
         echo "<div class='col'>";
         echo "<label id='label3'  class='form-check box_style' for='date_trip'>Data:</label>";
          echo "<input id='date_trip' name='date_trip' type='date' value='$date' min=";
          echo date('Y-m-d');
          echo "max=";
          echo date('Y-m-d', strtotime(date('Y-m-d'). ' + 29 days'));
          echo "name='date' class='form-control box_style' id='date' placeholder='dd/mm/yyyy'>";
         echo "</div>";
         echo "<div class='col'>";
         echo "<label id='label4'  class='form-check box_style' for='passanger'>Passageiros:</label>";
          echo "<input id='passenger' type='number' name='passenger'value='$passenger' placeholder='Passageiros' class='form-control box_style'>";
         echo "</div>";
         echo "<div class='col'>";
         echo "<label></label>";
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
    $oseats=0;
    foreach ($no_seats as $w){
      if($f->ways_id == $w->ways_id){
        $oseats=$w->available;
      }
    }

    $pass_rest=$f->max_seats-$oseats;
    echo "<tr>";
    $wayid=$f->ways_id;
    $price_discount=$f->price - ($f->price * $f->discount);
    if($pass_rest>=$passenger){
      echo "<td>$f->cname</td>";
      echo "<td>$f->timetable</td>";
      echo "<td>$f->first_city / $f->last_city</td>";

      echo "<td>$pass_rest</td>";
      echo "<td>$f->price</td>";
      echo "<td>$price_discount</td>";
      $way_id=$fi->ways_id;
      echo "<td><a class='btn btn-primary box_style' href='/efetuarcompra/$way_id/$passenger/$date'>Comprar</a></td>";
    }

    echo "</tr>";

  }
  echo "</tbody>";
echo "</table>";
echo "<input type='button' value='Voltar' class='btn btn-success box_style' onclick='location.href = history.go(-1);'>";

 ?>
<hr>
@endsection
