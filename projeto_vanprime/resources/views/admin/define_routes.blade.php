<div class="container card len">
  <div>
      <div class="text-xl-center">
        <h2>Definir Rota - Veículo {{$vehicle->board}}</h2>
      </div>
      <form id=formRegister action="/areaempresa/rotas/definirarota/{{$vehicle->id}}" method="POST" enctype="multipart/form-data">

      @csrf

            <div class="form-group">
                  <label id="label1" for="departure_city">Origem:</label>

                  <select id= "departure_city" class="custom-select form-control box_style" name="departure_city">
                    <option  value="0" disabled selected>Selecione</option>
                  @foreach ($municipios as $m)
                    <option  value="{{$m->Nome}}-{{$m->Uf}}">{{$m->Nome}}-{{$m->Uf}}</option>
                  @endforeach
                  </select>
              </div>



              <div class="form-group">
                  <label id="label2" for="stop_city">Destino:</label>

                  <select id="stop_city" class="custom-select form-control box_style" name="stop_city">
                      <option value="0" disabled selected>Selecione</option>
                    @foreach ($municipios as $m)
                      <option value="{{$m->Nome}}-{{$m->Uf}}">{{$m->Nome}}-{{$m->Uf}}</option>
                    @endforeach
                  </select>
              </div>

                <div class="form-group">
                  <label id="label3" for="timetable">Horário:</label>
                  <input type="text" class="form-control" id="timetable"  name="timetable">
                </div>


                  <input type="hidden" class="form-control" id="vehicle_id" value="{{$vehicle->id}}" name="vehicle_id">

                  <div class="row">
                      <div class="col form-group">
                        <label id="label4" for="price">Preço:</label>
                        <input type="text" class="form-control" id="price"  name="price">
                      </div>
                      <div class="col form-group">
                        <label id="label5" for="discount">Desconto:</label>
                        <input type="text" class="form-control" id="discount" value="0" placeholder="Exemplo: 0.1" name="discount">
                      </div>
                    </div>


        @if(isset($errors) && count($errors)>0)
        <div class="form-group">
          <div id="alerta1" class="alert alert-danger" style="display: block">
            @foreach($errors->all() as $e)
            <span>Por favor, insira dados válidos! {{$e}}</span>
            @endforeach
          </div>
        </div>
        @endif

        <button type="submit" class="btn btn-primary submits">Cadastro</button>

      </form>
    </div>
</div>
