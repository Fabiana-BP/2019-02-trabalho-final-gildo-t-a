<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // 1:N ->vehicles
    public function vehicles(){
      return $this->hasMany('App\Vehicle');
    }
}
