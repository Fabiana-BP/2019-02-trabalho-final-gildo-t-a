<div class="container">
  <div class="diferent_container1">
    <h1>Minhas compras</h1>
  </div>

  <table class="table table-bordered table-hover table-striped">
      <caption>Relação de compras feitas</caption>
      <thead>
          <tr>
              <th>Data da compra</th>
              <th>Data da viagem</th>
              <th>Valor total</th>
              <th>Rota</th>
              <th>Empresa</th>
              <th>Passagens</th>
              <th>Avaliar empresa</th>
          </tr>
      </thead>
      <tbody>
        <?php $i=0; ?>
        @foreach ($orders as $o)
        <tr>
          <td>{{$o->created_at}}</td>
          <td>{{$o->date_trip}}</td>
          <td>{{$o->cost}}</td>
          <td>{{$o->way->timetable}} - {{$o->way->departure_city}} / {{$o->way->stop_city}}</td>
          <td>{{$o->way->vehicle->company->name}}</td>
          <td>{{$passengers[$i]}}</td>
          <?php $id=$o->way->vehicle->company->id;
          $end="/areacliente/avaliaraempresa/$id";
          echo "<td><a href='$end' class='btn btn-success'>Avaliar</a></td>";
          ?>


        </tr>
        <?php $i=$i+1; ?>
        @endforeach

      </tbody>

  </table>
</div>
