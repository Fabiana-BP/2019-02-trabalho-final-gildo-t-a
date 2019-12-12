
    <div class="container">
      <form action="{{route('perfil.update',$user->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-group">
          <label for="name">Nome:</label>
          <input type="text" name="name" value="{{$user->name}}" class="form-control">
        </div>
        <div class="form-group">
          <label for="cpf">CPF:</label>
          <input type="text" name="cpf" value="{{$user->cpf}}" class="form-control">
        </div>

        <div class="form-group">
          <label for="email">E-mail:</label>
          <input type="email" name="email" value="{{$user->email}}" class="form-control">
        </div>

        <div class="form-group">
          <label for="phone">Celular:</label>
          <input type="text" name="phone" value="{{$user->phone}}" class="form-control">
        </div>

        <div class="form-group">
          <label for="image_user">Foto:</label>
          <input type="file" name="image_user" id="image_user">
        </div>


        <div class="custom-control">
          <a href="{{route('perfil.index')}}" class="btn btn-primary">Voltar</a>
          <input type="submit" value="Salvar" class="btn btn-success">

      </div>
      @if(isset($errors) && count($errors)>0)
      <div class="form-group">
        <div id="alerta1" class="alert alert-danger" style="display: block">
          <span>Por favor, insira dados válidos!</span>
        </div>
      </div>
      @endif
    </form>
</div>
