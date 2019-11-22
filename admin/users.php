<?php
    include "includes/admin_header.php";
?>

<div id="wrapper">

    <!-- Navegação -->
    <?php
        include "includes/admin_navigation.php";
    ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Cabeçalho -->
            <div class="col">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <small>Usuários</small>
                    </h1>


                    <?php 
                        if (isset($_GET['source'])) {
                            $source = addslashes(_GET['source']);
                        }
                        else {
                            $source = "";
                        }

                        switch ($source) {
                            case 'update_user':
                            include "includes/update_user.php";
                            break;

                            default: ?>
                            <table class="table table-bordered table-hover"> 
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Usuário</th>
                                        <th>Primeiro nome</th>
                                        <th>Último nome</th>
                                        <th>Foto</th>
                                        <th>Email</th>
                                        <th>Telefone</th>
                                        <th>Função</th>

                                    </tr>
                                </thead>

                                <tbody>

                                    <?php 

                                    $query = "SELECT *  FROM  users";
                                    $select_users = mysqli_query($connection,$query);

                                    while($row = mysqli_fetch_assoc($select_users)) {
                                        $user_id = $row['user_id'];
                                        $username = $row['username'];
                                        $user_firstname = $row['user_firstname'];
                                        $user_lastname = $row['user_lastname'];
                                        $user_email = $row['user_email'];
                                        $user_role = $row['user_role'];
                                        $user_phoneno = $row['user_phoneno'];  
                                        $user_image = $row['user_image'];                                      

                                        ?>
                                        <tr>
                                            <td><?php echo $user_id ?></td>
                                            <td><?php echo $username ?></td>
                                            <td><?php echo $user_firstname ?></td>
                                            <td><?php echo $user_lastname ?></td>
                                            <td><img width="100" src="images/<?php echo $user_image ?>"></td>
                                            <td><?php echo $user_email ?></td>
                                            <td><?php echo $user_phoneno ?></td>
                                            <td><?php echo $user_role ?></td>

                                            <?php echo "<td><a href='users.php?delete=$user_id'>Excluir</a></td>"; ?>
                                            <?php echo "<td><a href='users.php?source=update_user&user_id=$user_id'>Editar</a></td>"; ?>
                                            <?php echo "<td><a href='users.php?make_admin=$user_id'>Atribuir administrador</a></td>"; ?>
                                            <?php echo "<td><a href='users.php?remove_from_admin=$user_id'>Atribuir usuário</a></td>"; ?>
                                        </tr>

                                    <?php
                                        }
                                    ?>

                                </tbody>
                                </table><?php
                                break;
                            }

                        ?>

                        <?php 

                            if (isset($_GET['delete'])) {

                                $user_idd = addslashes($_GET['delete']);
                                $query = "DELETE FROM users WHERE user_id = {$user_idd} ";

                                $delete_query = mysqli_query($connection,$query);

                                if(!$delete_query) {
                                    die("Falha na requisição!" . mysqli_error($connection));
                                }
                                header("Location : users.php");
                            }

                            ?>

                            <?php 

                            if (isset($_GET['make_admin'])) {
                                $user_id = $_GET['make_admin'];
                                $query = "UPDATE users SET user_role = 'admin' WHERE user_id = '$user_id'";

                                $add_admin = mysqli_query($connection, $query);

                                if(!$add_admin) {
                                    die("Falha na requisição!" . mysqli_error($connection));
                                }
                                header("Location: users.php");
                            }

                        ?>

                        <?php 

                            if (isset($_GET['remove_from_admin'])) {
                                $user_id = addslashes($_GET['remove_from_admin']);
                                $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = '$user_id'";

                                $add_admin = mysqli_query($connection, $query);

                                if(!$add_admin) {
                                    die("Falha na requisição!" . mysqli_error($connection));
                                }
                                header("Location: users.php");
                            }

                        ?>

                    </div>
                </div>

            </div>

        </div>

        <?php include"includes/admin_footer.php"; ?>