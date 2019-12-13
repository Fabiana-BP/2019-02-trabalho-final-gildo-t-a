  <div class="container len">
    <div class="p-4 card">
        <div class="text-xl-center">
          <h2>Atualizar Empresa</h2>
        </div>

        <form action="/areaempresa/atualizarperfil/{{$company->id}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PATCH')


          <div class="form-group">
            <label id="label1" for="name">Nome da empresa:</label>
            <input type="text" class="form-control" id="name" value="{{$company->name}}" name="name"
            oninput="validateRegisterCompany('name','label1')" >
          </div>



          <div class="form-group">
            <label id="label2" for="cnpj">CNPJ:</label>
            <input type="text" class="form-control" id="cnpj" value="{{$company->cnpj}}" placeholder="XX.XXX.XXX/XXXX-XX"
            name="cnpj" onclick="validateRegisterCompany('name','label1')">
          </div>

          <div class="form-group">
            <label id="label3" for="street">Rua:</label>
            <input type="text" class="form-control" id="street" value="{{$company->street}}" name="street">
          </div>

         <div class="form-group">
            <label id="label4" for="neighborhood">Bairro:</label>
            <input type="text" class="form-control" id="neighborhood" value="{{$company->neighborhood}}" name="neighborhood"
            onclick="validateRegisterCompany('street','label3')" oninput="validateRegisterCompany('neighborhood','label4')">
          </div>

          <div class="form-group">
            <label id="label5" for="number">Número:</label>
            <input type="text" class="form-control" id="number"  name="number"  value="{{$company->number}}"
            onclick="validateRegisterCompany('neighborhood','label4')" oninput=""="validateRegisterCompany('number','label5')">
          </div>

          <div class="form-group">
            <label id="label6" for="city">Cidade:</label>
            <input type="text" class="form-control" id="city" value="{{$company->city}}" name="city"
            onclick="validateRegisterCompany('number','label5')" oninput="validateRegisterCompany('city','label6')">
          </div>

          <div class="form-group">
            <label id="label7" for="phone">Telefone:</label>
            <input type="text" class="form-control" id="phone" value="{{$company->phone}}"
             name="phone" onclick="validateRegisterCompany('city','label6')" oninput="validateRegisterCompany('phone','label7')">
          </div>

          <div class="form-group">
            <label id="label8" for="image_company">Foto</label>
            <input type="file" name="image_company" id="image_company" onclick="validateRegisterCompany('phone','label7')">
          </div>

          <div class="form-group">
            <label id="label9" for="email">E-mail:</label>
            <input type="text" class="form-control" id="email" value="{{$company->email}}" name="email"
            oninput="validateRegisterCompany('email','label9')"" onclick="validateRegisterCompany('phone','label7')" >
          </div>

          <div class="form-group">
            <label id="label10" for="web_page">Página WEB:</label>
            <input type="text" class="form-control" name="web_page" id="web_page" value="{{$company->web_page}}">
          </div>

          <div class="form-group">
            <label id="label11" for="content">Informação sobre a empresa:</label>
            <textarea class="form-control"  name="content" id="content"
              name="content" cols="30" rows="5">{{$company->content}}</textarea>
          </div>

          @if(isset($errors) && count($errors)>0)
          <div class="form-group">
            <div id="alerta1" class="alert alert-danger" style="display: block">
              <span>Por favor, insira dados válidos!</span>
            </div>
          </div>
          @endif

          <button type="submit" class="btn btn-primary submits" name="register">Atualizar</button>

        </form>
      </div>
  </div>
  <hr>
