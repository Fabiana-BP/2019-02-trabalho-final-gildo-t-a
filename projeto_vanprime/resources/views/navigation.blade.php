
 <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #182c39;" role="navigation">
          @guest
           <div class="row">
             <div class="col-1">
               <a class="navbar-brand" href="/"><img class="logo" src="{{ asset('img/vp-logo.png') }}"></a>
             </div>
             <div class="col-7">
             </div>
             <div class="col-2">
               <a class="navbar-brand" href="/login">Entrar</a>
             </div>
             <div class="col-2">
               <a class="navbar-brand" href="{{route('cadastro.create')}}">Cadastre-se</a>
             </div>
           </div>
           <div class="row">
             <div class="col">
             </div>
             <div class="col">
               <a class="navbar-brand" href="/">VanPrime Transportes</a>
             </div>
             <div class="col">
               <a class="navbar-brand" href="/cidadesmaisvisitadas">Cidades mais visitadas</a>
             </div>
             <div class="col">
               <a class="navbar-brand" href="/parceiros">Empresas conveniadas</a>
             </div>

          @else
           <div class="row">
             <div class="col-1">
               <a class="navbar-brand" href="/"><img class="logo" src="{{ asset('img/vp-logo.png') }}"></a>
             </div>
             <div class="col-7">
             </div>
           </div>
           <div class="row">
             <div class="col">
             </div>
             <div class="col">
               <a class="navbar-brand" href="/">VanPrime Transportes</a>
             </div>
             <div class="col">
               <a class="navbar-brand" href="/cidadesmaisvisitadas">Cidades mais visitadas</a>
             </div>
             @if(Auth::user()->user_role == 'company')
             <div class="col">
               <a class="navbar-brand" href="/areaempresa">Minha Empresa</a>
             </div>
             @endif
             @if(Auth::user()->user_role == 'client')
             <div class="col">
               <a class="navbar-brand" href="/areacliente/perfil">Minha Área</a>
             </div>
             @endif
             <div class="col">
               <a class="navbar-brand" href="/parceiros">Empresas conveniadas</a>
             </div>
             <div class="col">
               <li class="nav-item dropdown">
                   <a id="navbarDropdown" class="navbar-brand" href="#" style="color:white" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
