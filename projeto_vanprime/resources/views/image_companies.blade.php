<?php
use App\Company;
$companies=Company::orderBy('name')->get();
echo "<div class='jumbotron'>";
foreach ($companies as $c) {
  echo "<a href='#'>";
  echo "<img src='img/companies/$c->image_company' alt='$c->cname'>";
  echo "</a>";
  echo " ";
}
echo "</div>";
