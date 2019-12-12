
 <nav class="navbar navbar-expand-lg navbar-inverse navbar-fixed-top" style="background-color: #182c39;" role="navigation">

           <div class="row">
             <div class="col-1">
               <a class="navbar-brand" href="/"><img class="logo1" src="{{ asset('img/vp-logo.png') }}"></a>
             </div>

             <div class="col">
               <a class="navbar-brand" href="/">VanPrime Transportes</a>
             </div>
             <div class="col">
               <a class="navbar-brand" href="/areaempresa/visualizarperfil/{{Auth::User()->company}}">Perfil</a>
             </div>
             <div class="col">
               <a class="navbar-brand" href="/areaempresa">Veículos</a>
             </div>
             <div class="col">
               <a class="navbar-brand" href="/areaempresa/relatorios">Relatório</a>
             </div>
             <div class="col">

                   <a id="navbarDropdown" class="navbar-brand" href="#" style="color:white" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                       {{ Auth::user()->username }} <span class="caret"></span>
                   </a>

                   <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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

     </nav>
