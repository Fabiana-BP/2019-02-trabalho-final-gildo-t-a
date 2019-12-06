<div class="container well">
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
              <th>Adicionar assento</th>
          </tr>
      </thead>
      <tbody>

        @foreach ($vehicles as $v)
        <tr>
          <td>{{$v->board}}</td>
          <td>{{$v->max_seats}}</td>
          <td>{{$v->category->title}}</td>
          <td>{{$v->created_at}}</td>
          <td>{{$v->update_at}}</td>
          <td><a class='btn btn-primary' href="{{route('veiculos.edit',$v->id)}}">Editar</a></td>
          <td><a href="/areaempresa/veiculos/data_viagem/{{$v->id}}" class='btn btn-primary'>Adicionar assento</a></td>
        </tr>

        @endforeach

      </tbody>

  </table>
</div>
