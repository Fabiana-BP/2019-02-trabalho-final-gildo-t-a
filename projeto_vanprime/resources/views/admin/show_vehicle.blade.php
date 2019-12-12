<div class="container diferent_container2 len">
  <div class="well">

        <div class="form-group">
          <label id="label1" for="board">Placa:</label>
          <input type="text" value="{{$vehicle->board}}" class="form-control" id="board" name="board" disabled>
        </div>


        <div class="form-group">
          <label id="label2" for="category_id">Categoria:</label>
          <select id="category_id" class="custom-select form-control box_style" name="subject_id" disabled>
          @foreach ($categories as $c)
            <option class="form-control" value="{{ $c->id }}">{{ $c->title }}
              @if($vehicle->category_id == $c->id)
                selected
              @endif
            </option>
                @endforeach
          </select>
        </div>

        <div class="form-group">
          <label id="label3" for="max_seats">Número máximo de assentos:</label>
          <input type="text" value="{{$vehicle->max_seats}}" class="form-control" id="max_seats"  name="max_seats" disabled>
        </div>

        <div class="form-group">
          <label for="created_at">Cadastrado em:</label>
          <input type="text" name="created_at" value="{{date("d/m/Y", strtotime($vehicle->created_at))}}" class="form-control" disabled>
        </div>
        <div class="form-group">
          <label for="updated_at">Atualizado em:</label>
          <input type="text" name="updated_at" value="{{date("d/m/Y", strtotime($vehicle->updated_at))}}" class="form-control" disabled>
        </div>

        <a href="{{route('veiculos.index')}}" class="btn btn-primary ">Voltar</a>
        <a href="#" class="btn btn-primary">Editar</a>
        <a href="#" class="btn btn-primary">Excluir</a>

    </div>
</div>
