@include('header')
@include('navigation')
<div class="container diferent_container1 len1">
<?php
  if (!isset($_SESSION['s_username'])) {
    ?>
        <div class="well">
            <h4>Login</h4>
              <form action="includes/login.php" method="post">
              <div class="form-group">
                <input name="username" type="text" class="form-control" placeholder="Usuário">
              </div>
              <div class="form-group">
                <input name="password" type="password" class="form-control" placeholder="Senha" style="margin-top: 10px;">
              </div>
                <div class=" custom-control custom-switch text-xl-center">
                  <button class="btn btn-primary" name="login">Entrar</button>
                </div>

             </form>
        </div>
<?php } ?>
</div>
<hr>
@include('footer')
