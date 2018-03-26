<?php

use Faker\Generator as Faker;

$factory->define(App\ProductDetails::class, function (Faker $faker) {
    return [
    	    'product_id' => function () {
            return factory(App\Product::class)->create()->id;
        	},
            'rating' => rand(0,5),
            'desc' => $faker->text,
            ];
});
