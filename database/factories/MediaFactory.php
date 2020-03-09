<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Media;
use Faker\Generator as Faker;

$factory->define(Media::class, function (Faker $faker) {
    return [
        'type' => 'image',
        'url' => $faker->imageUrl(800, 600),
        'belongs_to' => $faker->numberBetween(1, 6000),
    ];
});
