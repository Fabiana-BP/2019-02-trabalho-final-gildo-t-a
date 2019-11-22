<?php include"includes/admin_header.php"; ?>

    <div id="wrapper">
        
        <!-- Navegação -->
        <?php include"includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">


                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Bem vindo
                            <small><?php echo ucfirst($_SESSION['s_username']);   ?></small>
                        </h1>
                    </div>
                </div>

            </div>

        </div>

<?php
    include"includes/admin_footer.php";
?>