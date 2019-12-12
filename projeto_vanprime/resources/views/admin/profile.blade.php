

    <div class="container">

      <h2 class="text-xl-center">Perfil</h2>

        <div class="form-group">
          <label for="name">Empresa:</label>
          <input type="text" name="name" value="{{$company->name}}" class="form-control" disabled>
        </div>

      <div class="form-group">
        <label for="content">Descrição:</label>
        <textarea type="text" name="content"class="form-control" disabled>{{$company->content}}</textarea>
      </div>

      <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="text" name="email" value="{{$company->email}}" class="form-control" disabled>
      </div>

      <div class="form-group">
        <label for="phone">Telefone:</label>
        <input type="text" name="phone" value="{{$company->phone}}" class="form-control" disabled>
      </div>


      <div class="form-group">
        <label for="web_page">Página web:</label>
        <a class="form-control" style="color:black" href="{{$company->web_page}}">{{$company->web_page}}</a>
      </div>

      <div class="form-group">
        <label for="address">Endereço:</label>
        <input type="text" name="address"
        value="{{$company->street}}, {{$company->number}}, Bairro: {{$company->neighborhood}}, Cidade: {{$company->city}}"
        class="form-control" disabled>
      </div>

      <div class="form-group">
        <label for="created_at">Cadastrado em:</label>
        <input type="text" name="created_at" value="{{date("d/m/Y", strtotime($company->created_at))}}" class="form-control" disabled>
      </div>
      <div class="form-group">
        <label for="updated_at">Atualizado em:</label>
        <input type="text" name="updated_at" value="{{date("d/m/Y", strtotime($company->updated_at))}}" class="form-control" disabled>
      </div>
      <div class="custom-control">
        <a href="/areaempresa/editarperfil/{{$company->id}}" class="btn btn-success">Editar</a>
      </div>
    </div>
