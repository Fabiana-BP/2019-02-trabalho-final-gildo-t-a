<div class="container">
  <div class="diferent_container1">
    <h1>Veículos</h1>
  </div>

  <table class="table table-bordered table-hover table-striped">
      <caption>Relação de rotas do veículo - {{$vehicle->board}}</caption>
      <thead>
          <tr>
              <th>Partida</th>
              <th>Embarque</th>
              <th>Desembarque</th>
              <th>Cadastrado em:</th>
              <th>Atualizado em:</th>
              <th>Editar</th>
              <th>Excluir</th>
          </tr>
      </thead>
      <tbody>

        @foreach ($ways as $w)
        <tr>
          <td>{{$w->timetable}}</td>
          <td>{{$w->departure_city}}</td>
          <td>{{$w->stop_city}}</td>
          <td>{{date("d/m/Y", strtotime($w->created_at))}}</td>
          <td>{{date("d/m/Y", strtotime($w->updated_at))}}</td>
          <td><a class='btn btn-primary' href="/areaempresa/rotas/editrota/{{$w->id}}">Editar</a></td>
          <td><a href="/areaempresa/rotas/desejadeletarrota/{{$w->id}}" class='btn btn-success'>Excluir</a></td>
        </tr>

        @endforeach

      </tbody>

  </table>

  <td><a href="/areaempresa/rotas/definirrota/{{$vehicle->id}}" class='btn btn-danger'>Adicionar nova rota</a></td>
</div>
