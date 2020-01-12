<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //

    protected $fillable = [
        'user_id', 'idea_id', 'fav_flag',
    ];

    public function ideas()
    {
        return $this->belongsTo('App\Idea');
    }

}
