<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    //

    protected $fillable = [
        'img', 'title', 'category_id','overflow','content','price','user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
//        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];
}

