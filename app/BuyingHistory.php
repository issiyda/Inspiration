<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyingHistory extends Model
{
    //
    protected $fillable = [
       'user_id','post_id','price'
    ];


}
