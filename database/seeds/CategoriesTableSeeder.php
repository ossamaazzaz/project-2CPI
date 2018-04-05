<?php
/*
created by oussama messabih 
at 26/03/2018 4 am 
categories Seeder
*/
use Illuminate\Database\Seeder;
use App\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// will generate 10 categories if you wanna change it just change the 10 value below
       factory(Category::class, 10)->create(); 
    }
}
