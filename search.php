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

            if(isset($_POST['submit'])) {
                $source = addslashes($_POST['source']);
                $destination = addslashes($_POST['destination']);
                $date = addslashes($_POST['date']);

                if ($source == "" || $destination == "") {
                    echo "<h2>*Necessário informar origem e destino!</h2>";
                }
                else {

                    $query = "SELECT * FROM posts WHERE post_via LIKE '%$source%$destination%' AND post_date='$date'";

                    $search_query = mysqli_query($connection, $query);

                    if(!$search_query) {
                        die("Falha na requisição! " . mysqli_error($connection));
                    }

                    $count = mysqli_num_rows($search_query);
                    if($count == 0) {
                        echo "<h1>SEM RESULTADOS</h1>";
                    }
                    else { 

                        while($row = mysqli_fetch_assoc($search_query)) {
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                            $post_id = $row['post_id']
                            ?>

                            <h2>
                                <a href="bus_info.php?bus_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                            </h2>
                            <p class="lead">
                                by <a href="index.php"><?php echo $post_author; ?></a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span> Veículo <?php echo $post_date; ?></p>
                            <hr>
                            <a href="bus_info.php?bus_id=<?php echo $post_id; ?>"><img class="img-responsive" src="images/<?php echo $post_image; ?>" alt=""></a>
                            
                            <hr>
                            <p><?php echo $post_content ?></p>
                            <a class="btn btn-primary" href="bus_info.php?bus_id=<?php echo $post_id; ?>">Ver mais... <span class="glyphicon glyphicon-chevron-right"></span></a>

                            <hr>
                        <?php }  
                    }
                }
            }?>



        </div>

        <?php include "includes/sidebar.php"; ?>

    </div>

    <hr>

    <?php
        include "includes/footer.php";
    ?>