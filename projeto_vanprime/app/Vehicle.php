<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'board', 'category_id', 'max_seats','company_id',
  ];

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
