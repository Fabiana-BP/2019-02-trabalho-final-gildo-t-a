<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Vanprime Transportes</title>
    <link rel="icon" href="./img/vp-icon.png">
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

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
<body>
  @yield('navigation_part')

  @yield('content_part')

  <footer id="myFooter" >

  <div>
      <div class="row">
          <div class="col-3">
            <h5>Formas de Pagamento</h5>
            <img src="{{ asset('img/formas_pagamento.png') }}">
          </div>
          <div class="col-3">
              <h5>Institucional</h5>
              <ul>
                 <li><a href="#">Quem somos</a></li>
                 <li><a href="#">Serviços</a></li>
                 <li><a href="#">Contato</a></li>
              </ul>
          </div>
          <div class="col-3">
              <h5>Parceiros</h5>
              <ul>
                <?php
            
                  foreach($categories as $c){ //fecth recupere e passe para frente
                    $cat_id=$c["id"];
                    echo "<li>";
                    echo "<a href='/categoria/$cat_id'>";
                    echo $c["title"];//igual do banco de dados
                    echo "</a>";
                    echo "</li>";
                  }

                 ?>

              </ul>
          </div>

          <div class="col-3">
              <h5>Termos</h5>
              <ul>
                  <li><a href="#">Termos de Serviço</a></li>
                  <li><a href="#">Termos de Uso</a></li>
                  <li><a href="#">Política de Privacidade</a></li>
              </ul>
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
