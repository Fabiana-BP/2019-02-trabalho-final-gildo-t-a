<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    // 1:N ->ways
    public function ways(){
      return $this->hasMany('App\Way');
    }

    // Vehicle -> Category
    public function category(){
      return $this->belongsTo('App\Category');
    }

    // Vehicle -> Company
    public function company(){
      return $this->belongsTo('App\Company');
    }
}
