<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{

	use SoftDeletes;
    protected $dates = ['deleted_at'];
    // public function user()
    // {
    //     return $this->belongsTo('App\User');
    // }
}
