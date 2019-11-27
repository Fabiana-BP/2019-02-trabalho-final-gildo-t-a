<?php
if (isset($_POST['register'])) {
  $username = addslashes($_POST['username']);
  $name = addslashes($_POST['name']);
  $cpf = addslashes($_POST['cpf']);
  move_uploaded_file($tmp_image, "/img/$image");
  if ($image == "") {
    $image = "user_default.jpg";
  }
  $email = addslashes($_POST['email']);
  $phone_no = addslashes($_POST['phone_no']);
  $password = md5(addslashes($_POST['password']));
  $user_type = addslashes($_POST['user_type']);

  $image = $_FILES['image']['name'];
  $tmp_image = $_FILES['image']['tmp_name'];


  validaTodosCadastro();


}
