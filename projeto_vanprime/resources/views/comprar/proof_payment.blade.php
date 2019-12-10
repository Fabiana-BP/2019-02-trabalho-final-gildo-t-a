@extends('base_view')
@section('navigation_part')
  @include('navigation')
@endsection
@section('content_part')
  <div class="form-group container len1">
    <h3>Obrigado pela compra {{Auth::User()->name}}, tenha uma excelente viagem!<h3>
    <br>
    <br>
  <div class="form-group p-4 card">
    <div class="form-group">
      <h2><strong>Comprovante de Pagamento</strong></h2>
    </div>
    <br>
    <div class="form-group">
      <h4>Cliente: {{Auth::User()->name}}</h4>
      <h4>CPF: {{Auth::User()->cpf}}</h4>
      <h4>Valor total: {{$order->cost}}</h4>
      <h4>Forma de pagamento: {{$order->type_pay}}</h4>
    </div>
    <br>
    <div class="form-group">
      <h4><strong>Descrição da rota:</strong></h4>
      <h4>Partida: {{$way->timetable}} - Embarque:{{$way->departure_city}} / Desembarque: {{$way->stop_city}}</h4>
      <h4>Empresa: {{$way->vehicle->company->name}}</h4>
    </div>
    <br>
    <div class="form-group">
      <h4><strong>Passageiros:<strong></h4>
        <?php $i=1;?>
        @foreach($passengers as $p)
          <h4>Passageiro {{$i}}: {{$p->nome}} ({{$p->age}} anos) - Poltrona: {{$p->seat}}</h4>
          <?php $i=$i+1;?>
        @endforeach
    </div>
    <br>
    <div class="form-group">
        <h4>Data da compra: {{date('d/m/y')}}</h4>
    </div>
  </div>
</div>
  <div class="container form-group text-xl-center">
    <a class="btn btn-success form-group" href="/home">Voltar</a>
  </div>


@endsection
