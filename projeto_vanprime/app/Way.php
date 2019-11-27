<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Way extends Model
{
    // 1:N -> armchairs
    public function armchairs(){
      return $this->hasMany('App\Armchair');
    }

    // 1:N -> orders
    public function orders(){
      return $this->hasMany('App\Order');
    }

    //Way -> Vehicle
    public function vehicle(){
      return $this->belongsTo('App\Vehicle',);
    }
}
