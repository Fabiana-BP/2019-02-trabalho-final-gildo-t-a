

<div class="jumbotron">
@foreach ($companies as $c)
<?php $site=$c->web_page;
if(empty($c->web_page)){
    $site="#";
}
?>
  <a href="{{$site}}"><img class="card-img-personal2" src="{{url('storage/companies/'.$c->image_company)}}" alt="{{$c->cname}}"></a>
@endforeach
</div>
