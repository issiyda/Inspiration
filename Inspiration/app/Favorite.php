<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //

    protected $fillable = [
        'user_id', 'idea_id', 'fav_flag',
    ];

    public function idea()
    {
        return $this->belongsTo('App\Idea');
    }

}
