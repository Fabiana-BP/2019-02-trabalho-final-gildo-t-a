<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Way extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'vehicle_id', 'departure_city', 'stop_city','timetable','price','discount',
  ];
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
