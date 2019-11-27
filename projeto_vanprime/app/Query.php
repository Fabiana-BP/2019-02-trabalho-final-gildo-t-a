<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    //Query -> User
    public function user(){
      return $this->belongsTo('App\User');
    }

    //Query -> Company
    public function company(){
      return $this->belongsTo('App\Company');
    }
}
