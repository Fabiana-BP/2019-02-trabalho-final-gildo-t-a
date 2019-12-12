<div class="container">
  <div class="diferent_container1">
    <h1>Relatório de Vendas da {{$company->name}}</h1>
  </div>

  <table class="table table-bordered table-hover table-striped">
      <caption>Relação de vendas totais da {{$company->name}}</caption>
      <thead>
          <tr>
              <th>Rota</th>
              <th>Total de passagens vendidas</th>
          </tr>
      </thead>
      <tbody>
        <?php $i=0; ?>
        @foreach ($nocustomers as $n)
        <tr>
          <td>{{$n->timetable}}  -  {{$n->departure_city}}  /  {{$n->stop_city}}</td>
          <td>{{$n->count}}</td>
        </tr>
        @endforeach
      </tbody>
  </table>



  <table class="table table-bordered table-hover table-striped">
      <caption>Relação de vendas totais da {{$company->name}} (realizadas pela plataforma Vanprime Transportes)</caption>
      <thead>
          <tr>
              <th>Rota</th>
              <th>Total de passagens vendidas</th>
          </tr>
      </thead>
      <tbody>
        <?php $i=0; ?>
        @foreach ($passengers as $p)
        <tr>
          <td>{{$p->timetable}}  -  {{$p->departure_city}}  /  {{$p->stop_city}}</td>
          <td>{{$p->count}}</td>
        </tr>
        @endforeach
      </tbody>
  </table>


</div>
