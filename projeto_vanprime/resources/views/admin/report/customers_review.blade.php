<div class="container">
  <div class="diferent_container1">
    <h1>Avaliações de Clientes</h1>
  </div>

  <table class="table table-bordered table-hover table-striped">
      <caption>Relação de comentários feitos por passageiros</caption>
      <thead>
          <tr>
              <th>Usuário</th>
              <th>Comentário</th>
              <th>Postado em</th>
              <th>Atualizado em</th>
          </tr>
      </thead>
      <tbody>
        <?php $i=0; ?>
        @foreach ($queries as $q)
        <tr>
          <td>{{$q->user->name}}</td>
          <td>{{$q->content}}</td>
          <td>{{date("d/m/Y", strtotime($q->created_at))}}</td>
          <td>{{date("d/m/Y", strtotime($q->updated_at))}}</td>
        </tr>
        @endforeach
      </tbody>

  </table>
</div>
