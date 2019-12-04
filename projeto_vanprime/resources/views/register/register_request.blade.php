
@extends('base_view')
@section('navigation_part')
  @include('navigation')
@endsection
@section('content_part')


  <div class="container diferent_container2 len">
    <div class="well">
        <div class="text-xl-center">
          <h2>Cadastrar</h2>
        </div>
        <form id=formRegister action="{{ route('cadastro.store') }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="form-group">

          <input class="form-check-input" type="radio" value="client" id="client" checked name="user_role">
          <label for="client" class="form-check" >Perfil Pessoal</label>
        </div>

        <div class="form-group">

          <input type="radio" id="company" name="user_role" value="company" class="form-check-input">
          <label for="company" class="form-check">Perfil Corporativo</label>
        </div>

          <div class="form-group">
            <label id="label1" for="username">Nome de usuário:</label>
            <input type="text" class="form-control" id="username" placeholder="Nome de Usuário (mínimo 3 dígitos)" name="username" >
          </div>


          <div class="form-group">
            <label id="label2" for="name">Nome Completo:</label>
            <input type="text" class="form-control" id="name" placeholder="Nome completo" name="name" onclick="validateRegisterUser('username','label1')">
          </div>

          <div class="form-group">
            <label id="label3" for="cpf">CPF:</label>
            <input type="text" class="form-control" id="cpf" placeholder="XXX.XXX.XXX-XX" name="cpf" onclick="validateRegisterUser('name','label2')">
          </div>

          <div class="form-group">
            <label id="label4" for="image_user">Foto</label>
            <input type="file" name="image_user" id="image_user">
          </div>

          <div class="form-group">
            <label id="label5" for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" onclick="validateRegisterUser('cpf','label3')">
          </div>

          <div class="form-group">
            <label id="label6" for="phone">Celular:</label>
            <input type="text" class="form-control" id="phone" placeholder="(XX)XXXXX-XXXX" name="phone" onclick="validateRegisterUser('email','label5')">
          </div>

          <div class="form-group">
            <label id="label7" for="password">Senha:</label>
            <input type="password" class="form-control" id="password" placeholder="senha (mínimo dígitos)" name="password" onclick="validateRegisterUser('phone','label6')">
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
