<?php
/*
created by oussama messabih 
at 26/03/2018 4 am 
factory of productdetails
*/
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
