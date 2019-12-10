<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'company_id', 'content','user_id',
  ];
    //Query -> User
    public function user(){
      return $this->belongsTo('App\User');
    }

    //Query -> Company
    public function company(){
      return $this->belongsTo('App\Company');
    }
}
