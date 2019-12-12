@extends('base_view')
@section('navigation_part')
  @include('navigation')
@endsection
@section('content_part')

<div class="len1">
    <div class="row">
      <div class="container col-8">

      <?php

        foreach( $companies as $c ){
          echo "<div class='container'>";
            echo "<a class ='container text-xl-center' href='$c->web_page'><h2>$c->name</h2></a>";
            echo "<div class='text-xl-center'>";?>
            <img src="{{url('storage/companies/'.$c->image_company)}}" class=" card-img-personal1" alt="{{$c->name}}">
            <?php
            echo "</div>";
            echo "<h5 class='container text-xl-center'>";
            echo $c->phone;
            echo "</h5 class='container'>";
            echo "<h5 class='container'>";
            echo $c->content;
            echo "</h5>";
            $cont=0;
            //comentarios
            echo "<h4 class='container'>Avaliações</h4>";
            echo "<div class='card-deck container' >";?>
            @foreach ($c->queries as $k)
              @if($cont<4)
                <?php $cont=$cont+1;  ?>
              <div class="card">
                <img src="{{url('storage/profiles/'.$k->user->image_user)}}" class="card-img-personal text-xl-center"  alt="{{$k->user->username}}">

                <div class="card-body">
                  <h5 class="card-title">{{$k->user->name}}</h5>
                  <p class="card-text">{{$k->content}}</p>
                  <p class="card-text"><small class="text-muted">{{date("d/m/Y", strtotime($k->updated_at))}}</small></p>
                </div>
              </div>
              @endif
            @endforeach
          <hr>
        </div>
      </div>
  <?php  } ?>

    </div>
    <div class="col-md-4 diferent_container1">
      @include('search')
    </div>

  </div>
</div>

<hr>
@endsection
