<?php
    include "db.php";
?>
<?php
    include "header.php";
?>

<!-- Navegação -->
<?php
    include "navigation.php";
?>

<!-- <div class="container jumbotron" style="width: 45%; border-radius: 15px"> -->

    <?php

        if (isset($_GET['orderid'])) {
            $orderid_cancel = addslashes($_GET['orderid']);
            $bus_id = addslashes($_GET['bus_id']);

            $query = "DELETE FROM orders WHERE order_id=$orderid_cancel";

            $cancel_order = mysqli_query($connection, $query);

            if (!$cancel_order) {
                die("Falha da requisição!" . mysqli_error($connection));
           }
       }

       $query = "SELECT available_seats FROM posts WHERE post_id=$bus_id";
       $get_seats = mysqli_query($connection,$query);

        while ($row = mysqli_fetch_assoc($get_seats)) {
            $available_seats = $row['available_seats'];
        }

        $query = "UPDATE posts SET available_seats=$available_seats-1 WHERE post_id=$bus_id";
        $update_seats = mysqli_query($connection, $query);

    ?>

    <div class="container" style="width: 50%;">

       <p><h3>Sua reserva foi cancelada com sucesso!</h3></p>
       <br>
       <p><h3>Volte sempre!!</h3></p>
    </div>
    <hr>

    <?php
        include "footer.php";
    ?>