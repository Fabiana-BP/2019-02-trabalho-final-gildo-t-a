<?php
  namespace App\Http\Controllers;
  use Illuminate\Http\Request;
  use App\Category;
 ?>
<!-- Footer -->

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
                      $categories = Category::orderBy('title')->get();
                      //var_dump($categories);
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
