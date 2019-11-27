<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // 1:N -> passangers
    public function passengers(){
      return $this->hasMany('App\Passenger');
    }

    //Order -> User
    public function user(){
      return $this->belongsTo('App\User');
    }

    //Order -> Way
    public function way(){
      return $this->belongsTo('App\Way');
    }
}
