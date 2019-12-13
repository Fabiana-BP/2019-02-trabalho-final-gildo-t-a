
    <div class="container">
      <form action="{{route('perfil.update',$user->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-group">
          <label id="label1" for="name">Nome:</label>
          <input id="name" type="text" name="name" value="{{$user->name}}" class="form-control"
          onchange="validateRegisterUser('name','label1')">
        </div>
        <div class="form-group">
          <label id="label2" for="cpf">CPF:</label>
          <input id="cpf" type="text" name="cpf" value="{{$user->cpf}}" class="form-control"
          onchange="validateRegisterUser('cpf','label2')">
        </div>

        <div class="form-group">
          <label id="label3" for="email">E-mail:</label>
          <input id=id="email" type="email" name="email" value="{{$user->email}}" class="form-control"
          onchange="validateRegisterUser('email','label3')">
        </div>

        <div class="form-group">
          <label id="label4" for="phone">Celular:</label>
          <input id="phone" type="text" name="phone" value="{{$user->phone}}" class="form-control"
          onchange="validateRegisterUser('phone','label4')">
        </div>

        <div class="form-group">
          <label id="label5" for="image_user">Foto:</label>
          <input type="file" name="image_user" id="image_user">
        </div>


        <div class="custom-control">
          <a href="/areacliente/perfil" class="btn btn-primary">Voltar</a>
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
