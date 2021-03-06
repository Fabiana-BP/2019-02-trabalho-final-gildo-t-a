<div class="container">
  <div class="diferent_container1">
    <h1>Veículos</h1>
  </div>

  <table class="table table-bordered table-hover table-striped">
      <caption>Relação de veículos da empresa</caption>
      <thead>
          <tr>
              <th>Placa</th>
              <th>Máximo de assentos</th>
              <th>Categoria</th>
              <th>Cadastrado em:</th>
              <th>Atualizado em:</th>
              <th>Editar</th>
              <th>Visualizar rotas</th>
              <th>Adicionar assento</th>
          </tr>
      </thead>
      <tbody>

        @foreach ($vehicles as $v)
        <tr>
          <td>{{$v->board}}</td>
          <td>{{$v->max_seats}}</td>
          <td>{{$v->category->title}}</td>
          <td>{{date("d/m/Y", strtotime($v->created_at))}}</td>
          <td>{{date("d/m/Y", strtotime($v->updated_at))}}</td>
          <td><a class='btn btn-primary' href="{{route('veiculos.edit',$v->id)}}">Editar</a></td>
          <td><a href="/areaempresa/rotas/{{$v->id}}" class='btn btn-success'>Visualizar Rotas</a></td>
          <td><a href="/areaempresa/veiculos/data_viagem/{{$v->id}}" class='btn btn-danger'>Adicionar assento</a></td>
        </tr>

        @endforeach

      </tbody>

  </table>
</div>
