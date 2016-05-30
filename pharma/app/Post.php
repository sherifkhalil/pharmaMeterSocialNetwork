<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image', 'content',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_token', 'user_id','views_num',
    ];
    /*Relation between tables */
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
 
    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }
}
