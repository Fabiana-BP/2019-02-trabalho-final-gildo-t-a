<p>Código para login no Vanprime Transportes </p>
<?php
$random=rand(100, 500);
session(['random' => $random]); ?>
<p>{{$random}}</p>
