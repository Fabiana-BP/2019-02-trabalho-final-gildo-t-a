      <form action="{{ route('veiculos.update',$vehicle->id) }}" method="POST">

      @csrf
      @method('PATCH')


        <div class="form-group">
          <label id="label1" for="board">Placa:</label>
          <input type="text" class="form-control" id="board" value="{{$vehicle->board}}" placeholder="XXX1234" name="board" >
        </div>


        <div class="form-group">
          <label id="label2" for="category_id">Categoria:</label>
          <select id="category_id" class="custom-select form-control box_style" name="subject_id" >
          <option class="form-control" value="0" disabled selected>Selecione</option>
          @foreach ($categories as $c)
            <option class="form-control" value="{{ $c->id }}"
              @if($vehicle->category_id == $c->id)
              selected
              @endif
              >{{ $c->title }}</option>
          @endforeach
          </select>
        </div>

        <div class="form-group">
          <label id="label3" for="max_seats">Número máximo de assentos:</label>
          <input type="text" class="form-control" id="max_seats" placeholder="Número máximo" name="max_seats"
           value="{{$vehicle->max_seats}}" onclick="validateRegisterVehicle('board','label1')" oninput="validateRegisterVehicle('max_seats','label3')">
        </div>


        @if(isset($errors) && count($errors)>0)
        <div class="form-group">
          <div id="alerta1" class="alert alert-danger" style="display: block">
            <span>Por favor, insira dados válidos!</span>
          </div>
        </div>
        @endif

        <input type="submit" value="Atualizar" class="btn btn-primary submits">

      </form>
