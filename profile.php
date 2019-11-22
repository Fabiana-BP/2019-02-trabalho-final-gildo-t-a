<?php
  include "includes/db.php";
?>
<?php
  include "includes/header.php";
?>

<!-- Navegação -->
<?php
  include "includes/navigation.php";
?>

<!-- Conteúdo da página -->
<div class="container" style="width: 50%;">

  <h2 style="margin-left: 40%;">Perfil</h2>

  <?php
    $image = $_SESSION['s_image'];
  ?>

  <img src="images/<?php echo $image;?>" width="200" style="margin-left: 32%;" class="img-circle" alt=""> 
  <br><br><br><br>
  <div class="tab">
    <button class="tablinks" style="width: 33%" onclick="openCity(event, 'Personel Details')">Detalhes</button>
    <button class="tablinks" style="width: 33%" onclick="openCity(event, 'Tickets Booked')">Reservas</button>
    <button class="tablinks" style="width: 33%"  onclick="openCity(event, 'Edit Details')">Editar</button>
  </div>


  <div id="Personel Details" class="tabcontent">
    <h3>Detalhes</h3>
    
    <br>
    <?php
    $curr_user_id = $_SESSION['s_id'];
    $query = "SELECT * FROM users where user_id = $curr_user_id";

    $select_user = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_user)) {
      $username = $row['username'];
      $user_firstname = $row['user_firstname'];
      $user_lastname = $row['user_lastname'];
      $user_email = $row['user_email'];
      $user_phoneno = $row['user_phoneno'];
      ?>

      <table class="table table-striped" style="width: 50%">
        <tbody>
          <tr>
            <td><b>Usuário:</b> </td>
            <td><?php echo $username; ?></td>
          </tr>
          <tr>
            <td><b>Primeiro nome:</b> </td>
            <td><?php echo ucfirst($user_firstname); ?></td>
          </tr>
          <tr>
            <td><b>Último nome: </b></td>
            <td><?php echo ucfirst($user_lastname); ?></td>
          </tr>
          <tr>
            <td><b>Email: </b></td>
            <td><?php echo $user_email; ?></td>
          </tr>
          <tr>
            <td><b>Telefone: </b></td>
            <td><?php echo $user_phoneno; ?></td>
          </tr>
        </tbody>
      </table>

    <?php } ?>
  </div>

  <div id="Tickets Booked" class="tabcontent">
    <h3>Reservas</h3>
    <br>

    <h3><b>Histórico:</b></h3>
    <?php

      $query = "SELECT * FROM orders INNER JOIN posts ON orders.bus_id = posts.post_id where orders.user_id = $curr_user_id";
      $select_user_orders = mysqli_query($connection, $query);

      while ($row = mysqli_fetch_assoc($select_user_orders)) {
        $passenger = $row['user_name'];
        $passenger_age = $row['user_age'];
        $source = $row['source'];
        $destination = $row['destination'];
        $dob = $row['date'];
        $cost = $row['cost'];
        $orderid = $row['order_id'];
        $busid = $row['bus_id'];
        $busdate = $row['post_date'];

        if (date("Y-m-d") > $busdate) {
          ?>
          <br>
          <table class="table table-striped" style="width: 50%">
            <tbody>
              <tr>
                <td><b>Passageiro:</b> </td>
                <td><?php echo $passenger; ?></td>
              </tr>
              <tr>
                <td><b>Idade:</b> </td>
                <td><?php echo $passenger_age; ?></td>
              </tr>
              <tr>
                <td><b>Origem: </b></td>
                <td><?php echo ucfirst($source); ?></td>
              </tr>
              <tr>
                <td><b>Destino: </b></td>
                <td><?php echo ucfirst($destination); ?></td>
              </tr>
              <tr>
                <td><b>Data da reserva: </b></td>
                <td><?php echo $dob; ?></td>
              </tr>
              <tr>
                <td><b>Preço: </b></td>
                <td><?php echo $cost; ?></td>
              </tr>
              <tr>
                <td><b>Emitir recibo<b></td>
                  <td><a href=" receipt.php?orderid=<?php echo $orderid ?>">Recibo</a></td>
                </tr>
                <br><br><br>
              </tbody>
            </table>

          <?php
        } } ?>

    <br><br><br>

    <h3 style="margin-bottom: -40px"><b>Próximas viagens:</b></h3>
    <?php

    $query = "SELECT * FROM orders INNER JOIN posts ON orders.bus_id = posts.post_id where orders.user_id = $curr_user_id";

    $select_user_orders = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_user_orders)) {
      $passenger = $row['user_name'];
      $passenger_age = $row['user_age'];
      $source = $row['source'];
      $destination = $row['destination'];
      $dob = $row['date'];
      $cost = $row['cost'];
      $orderid = $row['order_id'];
      $busid = $row['bus_id'];
      $busdate = $row['post_date'];

      if (date("Y-m-d") < $busdate) {

        ?>
        <br>
        <table class="table table-striped" style="width: 50%">
          <tbody>
            <tr>
              <td><b>Passageiro:</b> </td>
              <td><?php echo $passenger; ?></td>
            </tr>
            <tr>
              <td><b>Idade:</b> </td>
              <td><?php echo $passenger_age; ?></td>
            </tr>
            <tr>
              <td><b>Origem: </b></td>
              <td><?php echo ucfirst($source); ?></td>
            </tr>
            <tr>
              <td><b>Destino: </b></td>
              <td><?php echo ucfirst($destination); ?></td>
            </tr>
            <tr>
              <td><b>Data da reserva: </b></td>
              <td><?php echo $dob; ?></td>
            </tr>
            <tr>
              <td><b>Data da viagem: </b></td>
              <td><?php echo $busdate; ?></td>
            </tr>
            <tr>
              <td><b>Preço: </b></td>
              <td><?php echo $cost; ?></td>
            </tr>
            <tr>
              <td><b>Emitir recibo<b></td>
                <td><a href=" receipt.php?orderid=<?php echo $orderid ?>">Recibo</a></td>
              </tr>
              <tr>
                <td><b>Cancelar reserva<b></td>
                  <td>
                    <form action="includes/cancel.php?orderid=<?php echo $orderid ?>&bus_id=<?php echo $busid ?>" method="post">
                      <button class="btn btn-primary btn-xs" name="cancel">Cancelar</button></td>
                    </form>
                  </tr>
                  <br><br><br>
                </tbody>
              </table>

            <?php } } ?>



          </div>

          <div id="Edit Details" class="tabcontent">
            <h3>Editar detalhes</h3>
            <br>
            <?php

            $curr_user_id = $_SESSION['s_id'];
            $query = "SELECT * FROM users WHERE user_id = $curr_user_id ";
            $select_users = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_users)) {
              $username = $row['username'];
              $user_password = $row['user_password'];
              $user_firstname = $row['user_firstname'];
              $user_lastname = $row['user_lastname'];
              $user_password = $row['user_password'];
              $user_phoneno = $row['user_phoneno'];
              $user_email = $row['user_email'];
              $user_image = $row['user_image'];
            }

            if (isset($_POST['update-user'])) {
              $username = $_POST['username'];
              $user_password = $_POST['user_password'];
              $user_firstname = $_POST['user_firstname'];
              $user_lastname = $_POST['user_lastname'];
              $user_phoneno = $_POST['user_phoneno'];
              $user_email = $_POST['user_email'];


              $image = $_FILES['images']['name'];
              $tmp_image = $_FILES['images']['tmp_name'];

              move_uploaded_file($tmp_image, "admin/images/$image");

              $query = "UPDATE users SET username='{$username}', user_password='{$user_password}', user_firstname='{$user_firstname}', user_lastname='{$user_lastname}', user_password='{$user_password}', user_phoneno={$user_phoneno}, user_email='{$user_email}', user_image='{$image}' WHERE user_id=$curr_user_id";

              $update_bus = mysqli_query($connection,$query);

              if (!$update_bus) {
                die("Falha na requisição!" . mysqli_error($connection));
              }
              $_SESSION['s_image'] = $image;
              header("Location:profile.php");
            }

            ?>

            <form action="" method="post" enctype="multipart/form-data">

              <div class="form-group">
                <label for="username">Usuário</label>
                <input value="<?php echo $username; ?>" type="text" class="form-control" name="username">
              </div>

              <div class="form-group">
                <label for="firstname">Primeiro nome</label>
                <input value="<?php echo $user_firstname; ?>" type="text" class="form-control" name="user_firstname">
              </div>

              <div class="form-group">
                <label for="lastname">Último nome</label>
                <input value="<?php echo $user_lastname; ?>" type="text" class="form-control" name="user_lastname">
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input value="<?php echo $user_email; ?>" type="email" class="form-control" name="user_email">
              </div>

              <div class="form-group">
                <label for="phoneno">Telefone</label>
                <input value="<?php echo $user_phoneno; ?>" type="text" class="form-control" name="user_phoneno">
              </div>

              <div class="form-group">
                <label for="password">Senha</label>
                <input value="<?php echo $user_password?>" id="myInput" type="password" class="form-control" name="user_password">
              </div>

              <div class="form-group">
                <input type="checkbox" onclick="myFunction()">Mostrar senha
              </div>

              <div class="form-group">
                <img width="100" src="admin/images/<?php echo $user_image ?>">
              </div>

              <div class="form-group">
                <label for="bus-image">Foto</label>
                <input type="file" name="images" >
              </div>

              <div class="form-group">
                <input type="submit" class="btn btn-primary" name="update-user" value="Aplicar">
              </div>
            </form>


          </div>

        </div>
        <hr>


        <script>

          function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
              x.type = "text";
            } else {
              x.type = "password";
            }
          }


          function openCity(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
              tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
              tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
          }
        </script>

        <?php include "includes/footer.php"; ?> 