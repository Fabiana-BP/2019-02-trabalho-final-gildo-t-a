
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
        <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">

          <input class="form-check-input" type="radio" id="user_customer" name="user_type">
          <label for="user_customer" class="form-check" checked>Cliente</label>
        </div>

        <div class="form-group">

          <input type="radio" id="user_company" name="user_type" class="form-check-input">
          <label for="user_company" class="form-check">Empresa</label>
        </div>

          <div class="form-group">
            <label id="label1" for="username">Nome de usuário:</label>
            <input type="text" class="form-control" id="username" placeholder="Nome de Usuário" name="username">
          </div>

          <div class="form-group">
            <label id="label2" for="name">Nome Completo:</label>
            <input type="text" class="form-control" id="name" placeholder="Nome completo" name="name">
          </div>

          <div class="form-group">
            <label id="label3" for="cpf">CPF:</label>
            <input type="text" class="form-control" id="email" placeholder="CPF" name="cpf">
          </div>

          <div class="form-group">
            <label id="label4" for="image_user">Foto</label>
            <input type="file" name="image" id="image_user">
          </div>

          <div class="form-group">
            <label id="label5" for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" placeholder="E-mail" name="email">
          </div>

          <div class="form-group">
            <label id="label6" for="phone_no">Celular:</label>
            <input type="text" class="form-control" id="phone_no" placeholder="(XX)XXXXX-XXXX" name="phone_no">
          </div>

          <div class="form-group">
            <label id="label7" for="pwd">Senha:</label>
            <input type="password" class="form-control" id="pwd" placeholder="••••••••" name="password">
          </div>

          <div id="alerta1" class="alert alert-danger" style="display: none">
            <span>Existem dados que não foram preenchidos!</span>
          </div>

          <button type="submit" class="btn btn-primary submits" name="register">Cadastro</button>
        </form>
      </div>
  </div>
  <hr>
  @endsection
