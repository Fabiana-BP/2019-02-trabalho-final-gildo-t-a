<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Vanprime Transportes</title>
    <link rel="icon" href="img/vp-icon.png">
    <meta name="description" content="vanprime transportes">
    <meta name="viewport" content="width-device-width, initial-scale-1">
    <!--bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--outros-->
    <link rel="stylesheet" href="<?php echo asset('css/blog-home.css')?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('css/general-home.css')?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('css/search.css')?>" type="text/css">

    <!--javascript-->
    <script src="<?php echo asset('js/register.js')?>"></script>
    <script src="<?php echo asset('js/search.js')?>"></script>
    <script src="<?php echo asset('js/register_vehicle.js')?>"></script>
    <script src="<?php echo asset('js/compras.js')?>"></script>
    <script src="<?php echo asset('js/others.js')?>"></script>


    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
<body>
  @yield('navigation_part')
  @if(Session::has('mensagem'))
  <div class="alert alert-success len1">
    <strong>{{Session::get('mensagem')}}</strong>
  </div>
  @endif
  @if(Session::has('mensagem1'))
  <div class="alert alert-danger len1">
    <strong>{{Session::get('mensagem1')}}</strong>
  </div>
  @endif
  @yield('content_part')
  @yield('content')
  <footer id="myFooter" >

  <div>
      <div class="row">
          <div class="col-4 text-xl-center">
            <h5>Formas de Pagamento</h5>
            <img class="logo1 text-xl-center" src="{{ asset('img/formas_pagamento.png') }}">
          </div>
          <div class="col-4 text-xl-center">
            <ul>
              <h5><li><a class="text-xl-center" href="/institucional">Institucional</a></li></h5>
              </ul>
          </div>
          <div class="col-4 text-xl-center">
              <h5><a class="text-xl-center" href="/parceiros">Parceiros</a></h5>
          </div>

      </div>
  </div>
  <div>
  <div class="footer-copyright">
      <p>(F. Barreto & G. Azevedo - 2019) - Desenvolvido para fins acadêmicos.</p>
  </div>
  </footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </body>

  </html>
