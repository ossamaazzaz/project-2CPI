<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->domainWord,
        'description' => $faker->text,
        'picture' =>  $faker->imageUrl($width = 640, $height = 480, 'food'),
            ];
});
