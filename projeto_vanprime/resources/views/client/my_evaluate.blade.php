<div class="container">
  <div class="diferent_container1">
    <h1>Minhas avaliações</h1>
  </div>

  <table class="table table-bordered table-hover table-striped">
      <caption>Relação de empresas avaliadas</caption>
      <thead>
          <tr>
              <th>Empresa</th>
              <th>Avaliado em</th>
              <th>Atualizado em</th>
              <th>Avaliação</th>
              <th>Atualizar comentário</th>
          </tr>
      </thead>
      <tbody>
        <?php $i=0; ?>
        @foreach ($queries as $q)
        <tr>
          <td>{{$q->company->name}}</td>
          <td>{{date("d/m/Y", strtotime($q->created_at))}}</td>
          <td>{{date("d/m/Y", strtotime($q->updated_at))}}</td>
          <td>{{$q->content}}</td>
          <?php $company_id=$q->company->id;
          $end="/areacliente/atualizaraavaliacao/$company_id";
          echo "<td><a href='$end' class='btn btn-success'>Atualizar</a></td>";
          ?>


        </tr>
        <?php $i=$i+1; ?>
        @endforeach

      </tbody>

  </table>
</div>
