<?php
    include "includes/db.php";
?>
<?php
    include "includes/header.php";
?>

<!-- Navegação -->
<?php include "includes/navigation.php"; ?>

<!-- Conteúdo da página -->
<div class="container">

    <div class="row">

        <div class="col-md-8">

            <?php 

            if(isset($_GET['bus_id'])) {
                $selected_bus = addslashes($_GET['bus_id']);
            }

            $query = "SELECT *  FROM  posts WHERE post_id = $selected_bus ";

            $select_all_bus_query = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_all_bus_query)) {
                $bus_title = $row['post_title'];
                $bus_author = $row['post_author'];
                $bus_date = $row['post_date'];
                $bus_image = $row['post_image'];
                $bus_content = $row['post_content'];
                $bus_id = $row['post_id'];
                $bus_via = $row['post_via'];
                $times = $row['post_via_time'];
                $bus_cat = $row['post_category_id'];
                $available_seats = $row['available_seats'];
                $max_seats = $row['max_seats'];
                $bus_stations = explode(" ", $bus_via);
                $bus_times = explode(" ", $times);
                ?>

                <h2>
                    <a href="bus_info.php?bus_id=<?php echo $bus_id; ?>"><?php echo $bus_title; ?></a>
                </h2>
                <p class="lead">
                    por <a href="index.php"><?php echo $bus_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Postado em <?php echo $bus_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $bus_image; ?>" alt="">

                <hr>
                <p>
                    <?php
                        echo $bus_content
                    ?>
                </p>

                <div class="jumbotron jumb">
                    <h2><b>Assentos:</b></h2>
                    <h5>Máximo:         <?php echo $max_seats ?></h5>
                    <h5>Disponível:   <?php echo $available_seats ?></h5>


                    <h2><b>Estações percorridas:</b></h2>
                    <table class="table table-striped" style="width: 100%; margin-top:-20px;">
                      <thead>
                          <th><u>Estação</u></th>
                          <th><u>Horário</u> </th>
                      </thead>
                      <tbody>

                        <?php

                            for ($i=0; $i < sizeof($bus_stations); $i++) { ?>
                            <tr>
                              <td><?php echo $bus_stations[$i]; ?></td>
                              <td><?php echo $bus_times[$i]; ?></td>
                              </tr> <?php 
                          }

                          ?>
                          <br>
                      </tbody>
                  </table>
              </div>


              <?php

              if (isset($_SESSION['s_id'])) {

                ?>


                <div class="jumbotron">
                    <div class="container-fluid">
                        <h2>Detalhes:</h2>

                        <form action="" method="post" class="form-horizontal">

                            <select name="passenger_count" style="margin-bottom: 15px;margin-top: 15px;">
                                <option value="0">Reservas</option>
                                <?php
                                for ($i=1; $i <= $available_seats; $i++) { ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option> <?php
                                }

                                ?>
                            </select>
                            <button class="btn-xs btn-primary" style="margin-left: 5px;">IR</button>

                        </form>
                        <?php
                            //echo 'TESTE: ' . $_POST['passenger_count'];
                            if(isset($_POST['passenger_count']) && !empty($_POST['passenger_count'])) {
                                $action_cond = addslashes($_POST['passenger_count']);
                            } else {
                                $action_cond = '0';
                            }
                        ?>

                        <form action="bus_info.php?bus_id=<?php echo $selected_bus ?>&count=<?php echo $action_cond ?>" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Origem:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email" placeholder="Origem" name="source">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Destino:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email" placeholder="Destino" name="destination">
                                </div>
                            </div>

                            <?php

                            if (isset($_POST['passenger_count'])) {
                                $count = addslashes($_POST['passenger_count']);

                                for ($i=0; $i < $count; $i++) { 

                                    ?>
                                    <h6><?php echo "Passageiro "; echo $i+1;?></h6>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Nome:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="email" placeholder="Nome" name="name<?php echo "$i" ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Idade:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="email" placeholder="Idade" name="age<?php echo "$i" ?>">
                                        </div>
                                    </div>
                                    <?php
                                }

                            }

                            ?>

                            <button class="btn btn-primary" name="book" style="margin-left: 40%; margin-top: 15px;">Confirmar</button>

                        </form>

                        <?php

                        if (isset($_POST['book'])) {
                            if (isset($_GET['count'])) {
                                $count = addslashes($_GET['count']);
                            }
                            $source = $_POST['source'];
                            $destination = $_POST['destination'];
                            $cost = 0;


                            for ($i=0; $i < sizeof($bus_stations); $i++) { 

                                if($bus_stations[$i]==$source) {
                                    for ($j=$i; $j < sizeof($bus_stations); $j++) { 
                                        $k=$j+1;
                                        $begin = $bus_stations[$j];
                                        $inter = $bus_stations[$k];
                                        $query_new = "SELECT * FROM cost WHERE start='$begin' AND stopage='$inter' AND category=$bus_cat ";

                                        $get_cost = mysqli_query($connection,$query_new);
                                        while($row = mysqli_fetch_assoc($get_cost)) {
                                          $station_cost = $row['cost'];
                                          echo $station_cost;
                                          $cost += $station_cost;
                                      }


                                      if($bus_stations[$k]==$destination)
                                        break;
                                }
                                break;
                            }
                        }

                        $arr = array();
                        $arr1 = array();
                        for ($i=0; $i < $count; $i++) {
                            $name_query = 'name'.$i ;
                            $age_query = 'age'.$i ;
                            array_push($arr,$_POST[$name_query]);
                            array_push($arr1,$_POST[$age_query]);
                        }
                        for ($i=0; $i < $count; $i++) { 

                            $curr_name = $arr[$i];
                            $curr_age = $arr1[$i];
                            $user_id = $_SESSION['s_id'];

                            $query = "INSERT INTO orders(bus_id, user_id, user_name, user_age, source, destination, date, cost) VALUES($selected_bus, $user_id , '$curr_name', '$curr_age', '$source', '$destination', now(), $cost)";

                            $query_seat_update = "UPDATE posts SET available_seats = $available_seats + $count WHERE post_id = $bus_id";

                            $update_seats_available = mysqli_query($connection,$query_seat_update);
                            $booking_query = mysqli_query($connection,$query);
                            if (!$booking_query) {
                                die("Falha na requisição!" . mysqli_error($connection));
                            }
                        }
                    }

                    ?>
                </div>
            </div>
        <?php } ?>

        <hr>
    <?php } ?>


    <?php 

    if (isset($_POST['submit_query'])) {
        $user_name = ucfirst($_SESSION['s_username']);
        if($user_name == "") {
            $user_name = "(Usuário)";
        }
        $user_email = addslashes($_POST['user_email']);
        $user_query = addslashes($_POST['user_query']);

        $query = "INSERT INTO query(query_bus_id, query_user, query_email, query_date, query_content, query_replied) VALUES ('$selected_bus', '$user_name', '$user_email', now(), '$user_query', 'no')";

        $query_insert = mysqli_query($connection, $query);
        if(!$query_insert) {
            die("Falha na requisição!" . mysqli_error($connection));
        }

        $query = "UPDATE posts SET post_query_count = post_query_count + 1 WHERE post_id = $bus_id";
        $increase_query_count = mysqli_query($connection,$query);
    }

    ?>


    <div class="well">
        <h4>Deixe seu comentário:</h4>
        <form action="bus_info.php?bus_id=<?php echo $selected_bus ?>" method="post" role="form">


                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="user_email"></textarea>
                        </div>

                        <div class="form-group">
                            <label> Entrada</label>
                            <textarea class="form-control" rows="3" name="user_query"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit_query">Enviar</button>
                    </form>
                </div>

                <hr>


                <?php 

                $query = "SELECT * FROM query WHERE query_bus_id = $bus_id";
                $get_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($get_query)) {

                    $query_user = $row['query_user'];
                    $query_content = $row['query_content'];
                    $query_date = $row['query_date'];
                    
                    ?>


                    <!-- Comentário -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="images\user_default.png" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"> <?php echo $query_user; ?>
                            <small><?php echo $query_date; ?></small>
                        </h4>
                        <?php echo $query_content; ?>
                    </div>
                </div>

            <?php } ?>

        </div>

        <?php include "includes/sidebar.php"; ?>

    </div>

    <hr>

    <?php
        include "includes/footer.php";
    ?>