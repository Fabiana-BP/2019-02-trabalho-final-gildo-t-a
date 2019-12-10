<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'way_id', 'user_id', 'date_trip','cost','type_pay','cred_card_number',
  ];

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
