
  <div class="well">
    <h4>Buscar</h4>
    <form >

      <div class="row">
        <div class="col-3">
          <label id="label1" class="form-check box_style" for="source">Origem:</label>
        </div>
        <div class="col-9">
          <select id= "source" class="custom-select form-control box_style" name="source">
            <option  value="0" disabled selected>Selecione</option>
          @foreach ($sources as $s)
            <option  value="{{ $s->departure_city }}">{{ $s->departure_city }}</option>
          @endforeach
          </select>
        </div>
      </div>



      <div class="row">
        <div class="col-3">
          <label id="label2"  class="form-check box_style" for="destination">Destino:</label>
        </div>
        <div class="col-9">
          <select id="destination" class="custom-select form-control box_style" name="destination">
              <option class="form-control" value="0" disabled selected>Selecione</option>
            @foreach ($destinations as $d)
              <option class="form-control" value="{{ $d->stop_city }}">{{ $d->stop_city }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-3">
          <label id="label3"  class="form-check box_style" for="date_trip">Data:</label>
        </div>
        <div class="col-9">
          <input id="date_trip" name="date_trip" type="date" min=<?php echo date('Y-m-d');?>
            max=<?php echo date('Y-m-d', strtotime(date('Y-m-d'). ' + 29 days'));?>
            name="date" class="form-control box_style" id="date" placeholder="dd/mm/yyyy" >
        </div>
      </div>

      <div class="row">
        <div class="col-3">
          <label id="label4"  class="form-check box_style" for="date_trip">Passageiros:</label>
        </div>
        <div class="col-9">
            <input id="passenger" type="number" name="passenger" placeholder="Passageiros"class="form-control box_style">
        </div>
      </div>


      <input type="button" class="btn btn-primary box_style"  value="Buscar" onclick="search_routes()">
    </form>
  </div>
