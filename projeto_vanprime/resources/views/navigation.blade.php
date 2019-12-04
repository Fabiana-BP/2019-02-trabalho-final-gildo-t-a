
 <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #182c39;" role="navigation">

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
               <a class="navbar-brand" href="#">Cidades mais visitadas</a>
             </div>
             <?php
                 foreach($categories as $c){ //fecth recupere e passe para frente
                   $cat_id=$c["id"];
                   $cat_title=$c["title"];
                   echo "<div class='col'>";
                      echo "<a class='navbar-brand' href='/categoria/$cat_id'>$cat_title</a>";
                   echo "</div>";
                 }
             ?>
          </div>

     </nav>
