<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Request ;
// use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
// use Illuminate\Auth\Authenticatable;
// use Illuminate\Auth\Passwords\CanResetPassword;
// use Illuminate\Foundation\Auth\Access\Authorizable;
// use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
// use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
// use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
// class User extends  Eloquent implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract  {
//     use Authenticatable, Authorizable, CanResetPassword; 
    
//     protected $connection = 'mongodb';
//     protected $collection = 'users';
//     protected $fillable = ['name','email', 'password'];
//     protected $hidden = ['password', 'remember_token'];



// }




class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function isAdmin()
    {
         return $this->admin;
    } 


    public function request()
    {
        return $this->hasOne('App\Request');
    }
    public function personal()
    {
        return $this->hasOne('App\Personal_data','user_id');
    }
    public function posts()
    {
        return $this->hasManny('App\Post');
    }



}

