@include('header')
@include('navigation')

<div class="len1">
    <div class="row">
      <div class="col-8">

      <?php
      if (isset($_GET['category'])) {
              $cat_type = addslashes($_GET['category']);
          }
          $comp=array();
        foreach( $bus_content as $b ){
          echo "<class='row'>";
          if(empty($comp) || (!in_array($b->cname,$comp))){
            echo "<a href='$b->cweb'><h2>";
            echo $b->cname;
            echo "</h2></a>";
            echo "<div class='text-xl-center'>";
            echo "<img src=/img/companies/";
            echo $b->cimage;
            echo " class='img-responsive text-xl-center alt='$b->cname'>";
            echo "</div>";
            echo "<h5>";
            echo $b->cphone;
            echo "</h5>";
            echo "<h5>";
            echo $b->ccontent;
            echo "</h5>";
            $cont=0;
            //comentarios
            echo "<h4>Avaliações</h4>";
            echo "<div class='card-deck'>";
            foreach ($bus_content as $k) {

              if($cont<4 && $k->cname == $b->cname && (empty($comp) || (!in_array($k->cname,$comp)))){
                $cont=$cont+1;
                echo "<div class='card'>";
                echo "<img src='/img/users/";
                echo $k->uimage;
                echo "' class='card-img-personal text-xl-center' alt='$k->uname'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>";
                echo $k->uname;
                echo "</h5>";
                echo "<p class='card-text'>";
                echo $k->ucontent;
                echo "</p>";
                echo "<p class='card-text'><small class='text-muted'>";
                echo $k->udate;
                echo "</small></p>";
                echo "</div></div>";
              }
            }
            echo "</div>";

            $comp[]=$b->cname;
            echo "<hr>";
          }
      }
    ?>
  </div>
    <div class="col-md-4 diferent_container1">
      @include('search')
    </div>

  </div>
</div>

<hr>
@include('footer')
