<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable = [
        'user_id', 'idea_id','comment','star',
    ];


    public function ideas()
    {
       return $this->belongsTo('App\Idea');
    }

    public function user()
    {
        return $this->belongsTo('User','id','user_id');
    }



}
