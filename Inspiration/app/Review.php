<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable = [
        'user_id', 'idea_id', 'content','star',
    ];


    public function ideas()
    {
       return $this->belongsTo('App\Idea');
    }

}
