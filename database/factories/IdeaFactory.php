<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Idea;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Idea::class, function (Faker $faker) {
    return [
        //
        'user_id' => 1,
        'category_id' => 2,
        'img' => $faker->imageUrl(),
        'title' => $faker->title,
        'overflow' => $faker->text,
        'content' => $faker->text,
        'price' =>$faker->numberBetween(),
        'bought_flag'=> $faker->boolean,
        'delete_flag'=> $faker->boolean,


//created_at
//updated_at

    ];
});
