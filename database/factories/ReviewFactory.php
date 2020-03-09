<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween( 1 , 150 ),
        'product_id' => $faker->numberBetween( 1 , 2500 ),
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'rating' => $faker->numberBetween( 1 , 5 ),
    ];
});
