<div class="container">
  <div>
    <h4>Atualizar Poltronas - Veículo: {{$vehicle->board}}</h4>
    <br>
    <br>
  </div>

  <div class="row">
    <div class="col-3">
      <label class="box_style" for="date_trip">Data da viagem:</label>
      <input class="form-control box_style" type="date" name="date_trip" id="date_trip" value="{{$date_trip}}" disabled>
    </div>
    <div class="col-4">
      <label class="box_style" for="way_id">Rota:</label>
      <select id="way_id" class="custom-select box_style form-control box_style" name="way_id" disabled>
        @foreach ($ways as $w)
          <option class="form-control" value="{{ $w->id }}">{{ $w->departure_city }}-{{$w->stop_city}} {{$w->timetable}}
            @if($way_id == $w->way_id)
              selected
              @endif
            </option>
          @endforeach
      </select>
    </div>
  </div>
    <br>


  <div class="form-group">
    <p>Marque as  poltronas ocupadas:</p>
  </div>


  <?php
  //echo $armchairs;

  echo "<div class='container len form-group'>";

    $chairs=array();
    $styles=array();

    $cont=0;
    while($cont < $vehicle->max_seats){
      $s=$cont+1;
      $chairs[]="/areaempresa/veiculos/addpoltrona/$way_id/$date_trip/$s";
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
