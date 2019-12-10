
@extends('base_view')
@section('navigation_part')
  @include('navigation')
@endsection
@section('content_part')


  <div class="container len">
    <div class="well">
        <div class="text-xl-center">
          <h2>Cadastrar Empresa</h2>
        </div>

        <form action="/empresas/cadastro" method="post" enctype="multipart/form-data">

        @csrf



          <div class="form-group">
            <label id="label1" for="name">Nome da empresa:</label>
            <input type="text" class="form-control" id="name" placeholder="Nome da Empresa" name="name" oninput="validateRegisterCompany('name','label1')" >
          </div>



          <div class="form-group">
            <label id="label2" for="cnpj">CNPJ:</label>
            <input type="text" class="form-control" id="cnpj" placeholder="XX.XXX.XXX/XXXX-XX" name="cnpj">
          </div>

          <div class="form-group">
            <label id="label3" for="street">Rua:</label>
            <input type="text" class="form-control" id="street" placeholder="Rua:" name="street">
          </div>

         <div class="form-group">
            <label id="label4" for="neighborhood">Bairro:</label>
            <input type="text" class="form-control" id="neighborhood" placeholder="Bairro" name="neighborhood" onclick="validateRegisterCompany('street','label3')">
          </div>

          <div class="form-group">
            <label id="label5" for="number">Número:</label>
            <input type="text" class="form-control" id="number" placeholder="Número" name="number" onclick="validateRegisterCompany('neighborhood','label4')">
          </div>

          <div class="form-group">
            <label id="label6" for="city">Cidade:</label>
            <input type="text" class="form-control" id="city" placeholder="Cidade" name="city" onclick="validateRegisterCompany('number','label5')">
          </div>

          <div class="form-group">
            <label id="label7" for="phone">Telefone:</label>
            <input type="text" class="form-control" id="phone" placeholder="Telefone de contato" name="phone" onclick="validateRegisterCompany('city','label6')">
          </div>

          <div class="form-group">
            <label id="label8" for="image_company">Foto</label>
            <input type="file" name="image_company" id="image_company">
          </div>

          <div class="form-group">
            <label id="label9" for="email">E-mail:</label>
            <input type="text" class="form-control" id="email" placeholder="E-mail" name="email" >
          </div>

          <div class="form-group">
            <label id="label10" for="web_page">Página WEB:</label>
            <input type="text" class="form-control" name="web_page" id="web_page">
          </div>

          <div class="form-group">
            <label id="label11" for="content">Informação sobre a empresa:</label>
            <textarea class="form-control" id="content" placeholder="Conte para os clientes um pouco da empresa." name="content" onclick="validateRegisterCompany('phone','label7')"
            cols="30" rows="5"></textarea>
          </div>

          <div class="form-group" style="">
            <input type="hidden" class="form-control" value={{$username}} name="us">
          </div>

          @if(isset($errors) && count($errors)>0)
          <div class="form-group">
            <div id="alerta1" class="alert alert-danger" style="display: block">
              <span>Por favor, insira dados válidos!</span>
            </div>
          </div>
          @endif

          <button type="submit" class="btn btn-primary submits" name="register">Cadastro</button>

        </form>
      </div>
  </div>
  <hr>

  @endsection
