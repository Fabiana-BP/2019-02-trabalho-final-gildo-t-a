<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Vanprime Transportes</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
      <script src="<?php echo asset('js/compras.js')?>"></script>

    <!-- Fonts
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">-->

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--outros-->
    <link rel="stylesheet" href="<?php echo asset('css/blog-home.css')?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('css/general-home.css')?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('css/search.css')?>" type="text/css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
    <div>

       <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #182c39;" role="navigation">

                    <!-- Right Side Of Navbar -->

                        <!-- Authentication Links -->
                        @guest
                        <div class="row">
                          <div class="col-1">
                            <a class="navbar-brand" href="/"><img class="logo" src="{{ asset('img/vp-logo.png') }}"></a>
                          </div>
                          <div class="col-7">
                          </div>
                          <div class="col-2">
                            <a class="navbar-brand" href="/login">{{ __('Entrar') }}</a>
                          </div>
                          <div class="col-2">
                            <a class="navbar-brand" href="{{ route('cadastro.create') }}">{{ __('Cadastre-se') }}</a>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                          </div>
                          <div class="col">
                            <a class="navbar-brand" href="/">{{ __('VanPrime Transportes') }}</a>
                          </div>
                          <div class="col">
                            <a class="navbar-brand" href="/cidadesmaisvisitadas">{{ __('Cidades mais visitadas') }}</a>
                          </div>
                        </div>
                        @else
                        <div class="row">
                          <div class="col">
                          </div>
                          <div class="col">
                            <a class="navbar-brand" href="/">{{ __('VanPrime Transportes') }}</a>
                          </div>
                          <div class="col">
                            <a class="navbar-brand" href="/cidadesmaisvisitadas">{{ __('Cidades mais visitadas') }}</a>
                          </div>
                          @if(Auth::user()->role == 'company')
                          <div class="col">
                            <a class="navbar-brand" href="/areaempresa">{{ __('Minha Empresa') }}</a>
                          </div>
                          @endif
                          @if(Auth::user()->role == 'client')
                          <div class="col">
                            <a class="navbar-brand" href="/areacliente/perfil">{{ __('Minha Área') }}</a>
                          </div>
                          @endif
                          <div class="col">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" style="color:white" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                          </div>
                        @endguest

        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<footer id="myFooter" >

<div>
    <div class="row">
        <div class="col-3">
          <h5>Formas de Pagamento</h5>
          <img class="perfil" src="{{ asset('img/formas_pagamento.png') }}">
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

</html>
