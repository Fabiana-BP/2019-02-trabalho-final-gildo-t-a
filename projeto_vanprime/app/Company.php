<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //1:N ->vehicles
    public function vehicles(){
      return $this->hasMany('App\Vehicle');
    }

    //1:N ->queries
    public function queries(){
      return $this->hasMany('App\Query');
    }
}
