<?php
/*
created by oussama messabih 
at 26/03/2018 4 am 
factory of products
*/
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
            'name' => $faker->domainWord,
            'brand' => $faker->company,
            'price' => $faker->randomFloat(6,0,10000),
            'categoryId' => rand(0,10),
            'quantity'=> rand(0,100),
            'quantitySale' => rand(0,100),
            'image' => $faker->imageUrl($width = 640, $height = 480, 'food'),
 ];
});
