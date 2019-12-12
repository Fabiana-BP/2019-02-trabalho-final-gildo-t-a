
    <div class="container">
      <div class="form-group">
        <img class="perfilpequeno" src="{{url('storage/profiles/'.Auth::User()->image_user)}}" alt="{{Auth::User()->username}}">
      </div>

      <h2 class="text-xl-center">Perfil</h2>

        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" name="username" value="{{$user->username}}" class="form-control" disabled>
        </div>

      <div class="form-group">
        <label for="name">Nome:</label>
        <input type="text" name="name" value="{{$user->name}}" class="form-control" disabled>
      </div>
      <div class="form-group">
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" value="{{$user->cpf}}" class="form-control" disabled>
      </div>

      <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" name="email" value="{{$user->email}}" class="form-control" disabled>
      </div>

      <div class="form-group">
        <label for="phone">Celular:</label>
        <input type="text" name="phone" value="{{$user->phone}}" class="form-control" disabled>
      </div>

      <div class="form-group">
        <label for="created_at">Cadastrado em:</label>
        <input type="text" name="created_at" value="{{date("d/m/Y", strtotime($user->created_at))}}" class="form-control" disabled>
      </div>
      <div class="form-group">
        <label for="updated_at">Atualizado em:</label>
        <input type="text" name="updated_at" value="{{date("d/m/Y", strtotime($user->updated_at))}}" class="form-control" disabled>
      </div>
      <div class="custom-control">
        <a href="{{route('perfil.edit',$user->id)}}" class="btn btn-success">Editar</a>
      </div>
    </div>

  @if(isset($errors) && count($errors)>0)
  <div class="form-group">
    <div id="alerta1" class="alert alert-danger" style="display: block">
      <span>Por favor, insira dados válidos!</span>
    </div>
  </div>
  @endif
