<?php
    include "includes/db.php";
?>
<?php
    include "includes/header.php";
?>

<!-- Corpo da página -->
<?php
    include "includes/navigation.php";
?>

<div class="container">

    <div class="row">

        <div class="col-md-8">

            <?php
            $bus_per_page = 3;

            if (isset($_GET['page'])) {
                $page = addslashes($_GET['page']);
            }
            else {
                $page = "";
            }

            if ($page == "" || $page == 1) {
                $page_1 = 0;
            }
            else {
                $page_1 = ($page * $bus_per_page) - $bus_per_page;
            }

            $query = "SELECT *  FROM  posts";
            $bus_count = mysqli_query($connection,$query);
            $count = mysqli_num_rows($bus_count);

            $count = ceil($count / $bus_per_page) ;

            $query = "SELECT * FROM posts LIMIT $page_1,$bus_per_page";
            $select_all_posts_query = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                $post_id = $row['post_id'];

                if ($post_date > date('Y-m-d')) {
                    
                    ?>

                    <h2>
                        <a href="bus_info.php?bus_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                    </h2>
                    <p class="lead">
                        por <a href="index.php"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Postado em: <?php echo $post_date; ?></p>
                    <hr>
                    <a href="bus_info.php?bus_id=<?php echo $post_id; ?>"><img class="img-responsive" src="images/<?php echo $post_image; ?>" alt=""></a>
                    
                    <hr>
                    <p><?php echo $post_content; ?></p>

                    <hr>
                    <br><br>
                <?php } } ?>   


            </div>
            
            <?php include "includes/sidebar.php"; ?>

        </div>

        <hr>


        <ul class="pager">
            <?php
            for ($i=1; $i <= $count; $i++) { 
                if($i !== $page) {
                    echo "<li class='active'><a href='index.php?page=$i'>$i</a></li>";
                }
                else {
                    echo "<li><a href='index.php?page=$i'>$i</a></li>";
                }
            }

            ?>
        </ul>


        <?php include "includes/footer.php"; ?>