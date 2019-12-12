@extends('base_view')
@section('navigation_part')
  @include('navigation')
@endsection
@section('content_part')
  <div class="form-group container len1">
    <h4>Obrigado pela compra {{Auth::User()->name}}, tenha uma excelente viagem!<h4>
    <br>
    <br>
  <div class="form-group p-4 card">
    <div class="form-group">
      <h3><strong>Comprovante de Pagamento</strong></h3>
    </div>
    <br>
    <div class="form-group">
      <h5>Cliente: {{Auth::User()->name}}</h5>
      <h5>CPF: {{Auth::User()->cpf}}</h5>
      <h5>Valor total: {{$order->cost}}</h5>
      <h5>Forma de pagamento: {{$order->type_pay}}</h5>
    </div>
    <br>
    <div class="form-group">
      <h5><strong>Descrição da rota:</strong></h5>
      <h5>Partida: {{$way->timetable}} - Embarque:{{$way->departure_city}} / Desembarque: {{$way->stop_city}}</h5>
      <h5>Empresa: {{$way->vehicle->company->name}}</h5>
    </div>
    <br>
    <div class="form-group">
      <h5><strong>Passageiros:<strong></h5>
        <?php $i=1;?>
        @foreach($passengers as $p)
          <h5>Passageiro {{$i}}: {{$p->nome}} ({{$p->age}} anos) - Poltrona: {{$p->seat}}</h5>
          <?php $i=$i+1;?>
        @endforeach
    </div>
    <br>
    <div class="form-group">
        <h5>Data da compra: {{date('d/m/y')}}</h5>
    </div>
  </div>
</div>
  <div class="container form-group text-xl-center">
    <a class="btn btn-success form-group" href="/home">Voltar</a>
  </div>


@endsection
