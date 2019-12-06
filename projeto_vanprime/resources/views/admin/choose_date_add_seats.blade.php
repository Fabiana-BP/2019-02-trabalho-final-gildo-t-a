<div class="container">
  <div class="form-group">
    <h5><strong>Atualizar Poltronas - {{$vehicle->board}}</strong></h5>
  </div>
  <form action="/areaempresa/veiculos/data_viagem/poltronas" method="POST">
    @csrf

    <input type="hidden" value="{{$vehicle->board}}" name="board">

    <div class="row">
      <div class="col-5">
        <label for="date_trip">Data da viagem:</label>
        <input class="form-control box_style" type="date" name="date_trip" id="date_trip">
      </div>
      <div class="col-5">
        <label for="way_id">Rota:</label>
        <select id="way_id" class="custom-select box_style form-control box_style" name="way_id">
            <option class="form-control" value="0" disabled selected>Selecione</option>
          @foreach ($ways as $w)
            <option class="form-control" value="{{ $w->id }}">{{ $w->departure_city }}-{{$w->stop_city}} {{$w->timetable}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-2">
        <label style="color:white">Data da viagem:</label>
        <input type="submit" value="Escolher" class="btn btn-primary box_style">
      </div>
    </div>
  </form>
</div>
