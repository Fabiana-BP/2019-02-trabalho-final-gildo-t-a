<?php
  include "includes/db.php";
?>
<?php
  include "includes/header.php";
?>

<!-- Navegação -->
<?php include "includes/navigation.php"; ?>

<?php

if (isset($_POST['register'])) {
  $username = addslashes($_POST['username']);
  $firstname = addslashes($_POST['firstname']);
  $lastname = addslashes($_POST['lastname']);
  $email = addslashes($_POST['email']);
  $phone_no = addslashes($_POST['phone_no']);
  $password = md5(addslashes($_POST['password']));

  $image = $_FILES['image']['name'];
  $tmp_image = $_FILES['image']['tmp_name'];

  move_uploaded_file($tmp_image, "images/$image");
  if ($image == "") {
    $image = "user_default.jpg";
  }

  if ($username=="" || $firstname=="" || $lastname=="" || $email=="" || $phone_no=="" || $image=="" || $password=="") {
  # code...
    echo "**Todos os campos são obrigatórios";
  }

  else {

    $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_phoneno, user_role, user_image) VALUES('$username', '$password', '$firstname', '$lastname', '$email', '$phone_no', 'subscriber', '$image') ";

    $register_user = mysqli_query($connection, $query);

    if(!$register_user) {
      die("Erro na conexão! " . mysqli_error($connection));
    }

    header("Location: index.php");

  }

}

?>

  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <img src="images/bus_regis.png" style="margin-top: 30%;">
      </div>
      <div class="col-lg-6">


        <h2 style="margin-left: 40%;">Cadastrar</h2>
        <form action="" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <label for="email">Nome de usuário:</label>
            <input type="text" class="form-control" id="email" placeholder="Nome de Usuário" name="username">
          </div>

          <div class="form-group">
            <label for="email">Primeiro nome:</label>
            <input type="text" class="form-control" id="email" placeholder="Primeiro Nome" name="firstname">
          </div>

          <div class="form-group">
            <label for="email">Último nome:</label>
            <input type="text" class="form-control" id="email" placeholder="Último Nome" name="lastname">
          </div>

          <div class="form-group">
            <label for="bus-image">Foto</label>
            <input type="file" name="image" >
          </div>

          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
          </div>

          <div class="form-group">
            <label for="pwd">Telefone:</label>
            <input type="text" class="form-control" id="pwd" placeholder="(XX)XXXX-XXXX" name="phone_no">
          </div>

          <div class="form-group">
            <label for="pwd">Senha:</label>
            <input type="password" class="form-control" id="pwd" placeholder="••••••••" name="password">
          </div>

          <button type="submit" class="btn btn-primary" name="register" style="margin-left: 45%; margin-top: 20px;">Register</button>
        </form>


      </div>
    </div>

  </div>
  <hr>

  <?php include "includes/footer.php"; ?>