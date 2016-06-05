<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postup extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'post_id', 'user_id',
    ];
    /*Relation between tables */
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
     public function post()
    {
    	return $this->belongsTo(Post::class);
    }
 
}
