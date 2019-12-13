  <div class="container card len">
    <div>
        <div class="text-xl-center">
          <h2>Cadastrar Veículo</h2>
        </div>
        <form id=formRegister action="{{ route('veiculos.store') }}" method="post" enctype="multipart/form-data">

        @csrf

          <div class="form-group">
            <label id="label1" for="board">Placa:</label>
            <input type="text" class="form-control" id="board" placeholder="XXX1234" name="board"
              onchange="validateRegisterVehicle('board','label1')">
          </div>


          <div class="form-group">
            <label id="label2" for="category_id">Categoria:</label>
            <select id="category_id" class="custom-select form-control box_style" name="category_id"
            onclick="validateRegisterVehicle('board','label1')" onchange="validateRegisterVehicle('category_id','label2')">
            <option class="form-control" value="0" disabled selected>Selecione</option>
            @foreach ($categories as $c)
              <option class="form-control" value="{{ $c->id }}">{{ $c->title }}</option>
                  @endforeach
            </select>
          </div>

          <div class="form-group">
            <label id="label3" for="max_seats">Número máximo de assentos:</label>
            <input type="text" class="form-control" id="max_seats" placeholder="Número máximo" name="max_seats"
            onchange="validateRegisterVehicle('max_seats','label3')">
          </div>


          @if(isset($errors) && count($errors)>0)
          <div class="form-group">
            <div id="alerta1" class="alert alert-danger" style="display: block">
              <span>Por favor, insira dados válidos!</span>
            </div>
          </div>
          @endif

          <button type="submit" class="btn btn-primary submits">Cadastro</button>

        </form>
      </div>
  </div>
