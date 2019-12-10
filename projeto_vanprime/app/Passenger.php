<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'nome', 'age','seat','order_id',
  ];

    //Passanger -> Order (N:1)
    public function order(){
      return $this->belongsTo('App\Order');
    }
}
