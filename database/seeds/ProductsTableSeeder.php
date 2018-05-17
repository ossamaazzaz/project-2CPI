<?php
/*
created by oussama messabih 
at 26/03/2018 4 am 
 products seeder
*/
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
    	// will generate 200 product if you wanna change it just change the 200 value below
    	factory(Product::class, 50)
           ->create()
           ->each(function ($u) {
                $u->productDetails()->save(factory(ProductDetails::class)->make());
            });
        }
}
