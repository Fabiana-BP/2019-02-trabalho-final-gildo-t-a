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

    // 1:N -> nocustomers
    public function nocustomers(){
      return $this->hasMany('App\Nocustomer');
    }

    //Way -> Vehicle
    public function vehicle(){
      return $this->belongsTo('App\Vehicle');
    }
}
