<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\ProductDetails;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(Product::class, 200)
           ->create()
           ->each(function ($u) {
                $u->productDetails()->save(factory(ProductDetails::class)->make());
            });
        }
}
