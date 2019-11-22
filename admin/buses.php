<?php include"includes/admin_header.php"; ?>

    <div id="wrapper">
        
        <!-- Navegação -->
        <?php include"includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Cabeçalho -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Veículos</small>
                        </h1>


                        <?php 

                        if (isset($_GET['source'])) {
                            $source = addslashes($_GET['source']);
                        }
                        else {
                            $source = "";
                        }

                        switch ($source) {
                            case 'add_bus':
                                include "includes/add_bus.php";
                                break;
                            
                            case 'update':
                                include "includes/update.php";
                                break;

                            default: ?>
                                <table class="table table-bordered table-hover"> 
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nome do adm.</th>
                                        <th>Origem/Destino</th>
                                        <th>Estação interm.</th>
                                        <th>Categoria</th>
                                        <th>Imagem</th>
                                        <th>Data</th>
                                        <th>Horário</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                    <?php 

                                        $query = "SELECT *  FROM  posts";
                                        $select_posts = mysqli_query($connection,$query);

                                        while($row = mysqli_fetch_assoc($select_posts)) {
                                            $bus_id = $row['post_id'];
                                            $admin_name = $row['post_author'];
                                            $source = $row['post_source'];
                                            $destination = $row['post_destination'];
                                            $intermediate_station = $row['post_via'];
                                            $category = $row['post_category_id'];
                                            $image = $row['post_image'];
                                            $date = $row['post_date'];
                                            $time = $row['post_via_time'];
                                        
                                        if ($date > date('Y-m-d')) {
                                            # code...
                                        

                                     ?>
                                    <tr>
                                        <td><?php echo $bus_id ?></td>
                                        <td><?php echo $admin_name ?></td>
                                        <td><?php echo $source . " - ". $destination?></td>
                                        <td><?php echo $intermediate_station ?></td>
                                        <td><?php echo $category ?></td>
                                        <td><img width="100" src="../images/<?php echo $image ?>"></td>
                                        <td><?php echo $date ?></td>
                                        <td><?php echo $time ?></td>
                                        <?php echo "<td><a href='buses.php?delete=$bus_id'>Excluir</a></td>"; ?>
                                        <?php echo "<td><a href='buses.php?source=update&bus_id=$bus_id'>Atualizar</a></td>"; ?>
                                        <?php echo "<td><a href='buses.php?clone_bus_id=$bus_id'>Duplicar</a></td>"; ?>
                                    </tr>
                                    <?php } }?>
                                </tbody>
                                </table><?php
                                break;
                        }

                        ?>


                        <?php

                        if (isset($_GET['clone_bus_id'])) {
                            $bus_id = addslashes($_GET['clone_bus_id']);


                        $query = "SELECT *  FROM  posts WHERE post_id=$bus_id";
                        $select_posts = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($select_posts)) {
                            $admin_name = $row['post_author'];
                            $title = $row['post_title'];
                            $bus_detail = $row['post_content'];
                            $source = $row['post_source'];
                            $destination = $row['post_destination'];
                            $intermediate = $row['post_via'];
                            $category = $row['post_category_id'];
                            $image = $row['post_image'];
                            $date = $row['post_date'];
                            $via_time = $row['post_via_time'];
                            $max_seats = $row['max_seats'];
                            $available_seats = $row['available_seats'];

                            $query_new = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_source, post_destination, post_via, post_via_time, max_seats, available_seats) VALUES({$category}, '{$title}', '{$admin_name}', '{$date}', '{$image}', '{$bus_detail}', '{$source}', '{$destination}', '{$intermediate}', '{$via_time}', $max_seats, $available_seats)";
                            }

                            $clone_bus = mysqli_query($connection,$query_new);

                            header("Location:buses.php");
                        }
                        ?>



                        <?php 

                        if (isset($_GET['delete'])) {
                            
                            $bus_idd = addslashes($_GET['delete']);
                            $query = "DELETE FROM posts WHERE post_id = {$bus_idd} ";

                            $delete_bus = mysqli_query($connection,$query);
                            if(!$delete_bus) {
                                die("Requisição falhou!" . mysqli_error($delete_bus));
                            }
                            header("Location: buses.php");
                        }

                        ?>


                    </div>
                </div>

            </div>

        </div>

<?php include"includes/admin_footer.php"; ?>