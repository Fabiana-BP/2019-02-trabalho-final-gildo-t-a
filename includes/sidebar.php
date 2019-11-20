            <div class="col-md-4">

                <div class="well">
                    <h4>Buscar</h4>
                    <form action="search.php" method="post">

                        
                        <input name="source" type="text" class="form-control" placeholder="Origem">
                        <input name="destination" type="text" class="form-control" placeholder="Destino" style="margin-top: 10px;">


                        <input type="date" style="margin-top: 10px;" min=<?php echo date('Y-m-d');?> max=<?php echo date('Y-m-d', strtotime(date('Y-m-d'). ' + 29 days'));?> name="date" class="form-control" id="date" placeholder="dd/mm/yyyy" >
                        
                        <button class="btn btn-primary" name="submit" style="margin-left: 130px; margin-top: 10px;">Buscar</button>
                        
                    </form>
                </div>


                <!-- Login -->
                <?php

                if (!isset($_SESSION['s_username'])) {
                    ?>
                    <div class="well">
                        <h4>Login</h4>
                        <form action="includes/login.php" method="post">

                            
                            <input name="username" type="text" class="form-control" placeholder="Usuário">
                            <input name="password" type="password" class="form-control" placeholder="Senha" style="margin-top: 10px;">

                            <button class="btn btn-primary" name="login" style="margin-left: 130px; margin-top: 10px;">Entrar</button>
                            
                        </form>
                    </div>
                    
                <?php } ?>

                <!-- Categorias -->
                <div class="well">


                    <?php 

                    $query = "SELECT *  FROM  categories";
                    $select_categories_sidebar = mysqli_query($connection, $query);

                    ?>




                    <h4>Categorias</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">

                                <?php  
                                while($row = mysqli_fetch_assoc($select_categories_sidebar)) {
                                    $cat_title = $row['cat_title'];
                                    $cat_id = $row['cat_id'];
                                    echo "<li> <a href='category.php?category=$cat_id'> $cat_title </a></li>";
                                }

                                ?>
                                
                            </ul>
                        </div>

                    </div>
                </div>

            </div>