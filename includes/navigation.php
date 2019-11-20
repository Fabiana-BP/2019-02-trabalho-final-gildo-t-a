<?php
    include "db.php"
?>

    <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #182c39;" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Aba de navegação</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">VanPrime</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php 

                        $query = "SELECT *  FROM  categories";
                        $select_all_categories_query = mysqli_query($connection,$query);

                        while($row = mysqli_fetch_assoc($select_all_categories_query)) {
                            $cat_title = $row['cat_title'];
                            $cat_id = $row['cat_id'];
                            echo "<li> <a href='category.php?category=$cat_id'> {$cat_title} </a></li>";
                        }
                     ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <?php 
                        if(isset($_SESSION['s_username'])) {
                            if($_SESSION['s_role']=='admin') {
                                ?>
                                <li>
                                    <a href="admin/index.php"><i class="fa fa-fw fa-child"></i>Administrador</a>
                                </li>
                            }
                        <?php
                            }
                            }
                        ?>
                        <li>
                            <a href="registration.php"><i class="fa fa-fw fa-desktop"></i>Registrar!</a>
                        </li>
                        <li>
                            <a href="#">Quem somos</a>
                        </li>
                        <li>
                            <a href="#">Serviços</a>
                        </li>
                        <li>
                           <a href="#">Contato</a>
                        </li>

                        <?php
                        if(isset($_SESSION['s_username'])) {
                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                                    <?php
                                    if(isset($_SESSION['s_username']))
                                        echo ucfirst($_SESSION['s_username']);
                                    ?>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="profile.php"><i class="fa fa-fw fa-user"></i>Perfil</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="includes/logout.php"><i class="fa fa-fw fa-power-off"></i>Sair</a>
                                    </li>
                                </ul>
                            </li>
                            
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
