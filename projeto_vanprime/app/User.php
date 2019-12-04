<?php

namespace App;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    // 1:N ->queries
    public function queries(){
      return $this->hasMany('App\Query');
    }

    // 1:N ->orders
    public function orders(){
      return $this->hasMany('App\Order');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username','cpf','phone',
        'image_user', 'user_role', 'company',
    ];

    public function rules(){
      return [
        'name'=>'required|min:3|max:255',
        'email'=>'required|min:6|max:255',
        'password' =>'required|min:3|max:255',
        'username' =>'required|min:3|max:10',
        'cpf' =>'required|min:14|max:14',
        'phone'=>'required|min:11|max:14',
        ];

    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
