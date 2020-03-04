<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Restaurant;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraphs(3, true),
        'address_id' => $faker->numberBetween( 1, 249 ),
        'user_id' => $faker->numberBetween( 1, 149 ),
    ];
});
