<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    //Passanger -> Order (N:1)
    public function order(){
      return $this->belongsTo('App\Order');
    }
}
