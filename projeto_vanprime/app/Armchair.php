<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Armchair extends Model
{
    
    //Armchair -> Way
    public function way(){
      return $this->belongsTo('App\Way');
    }
}
