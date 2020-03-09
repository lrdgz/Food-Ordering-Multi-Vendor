<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween( 1 , 150 ),
        'restaurant_id' => $faker->numberBetween( 1 , 150 ),
        'category_id' => $faker->numberBetween( 1 , 150 ),
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'price' => $faker->numberBetween( 1 , 500 ),
        'discount' =>  $faker->randomElement([ 0, 5, 10, 15 ]),
        'prepare_time' =>  $faker->randomElement([ 5, 10, 15, 30, 45 ]),
        'chef' => $faker->lastName . $faker->firstName,
        'likes' => $faker->numberBetween( 0 , 250 ),
    ];
});
