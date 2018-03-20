<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Product;
class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('brand');
            $table->float('price')->default(0);
            $table->integer('categoryId');
            $table->integer('quantitySale')->default(0);
            $table->integer('quantity')->default(0);
            $table->string('image')->nullable();
            $table->timestamps();
        });
        /*create fake data*/
        // for ($i=0; $i < 200; $i++) { 
        //     Product::create([
        //     'name' => 'product_name_'.$i,
        //     'brand' => 'brand_'.$i,
        //     'price' => rand(10,1000),
        //     'categoryId' => rand(0,10),
        //     'quantity'=> rand(0,100),
        //     'quantitySale' => rand(0,100),
        //     ]); 
        // }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
