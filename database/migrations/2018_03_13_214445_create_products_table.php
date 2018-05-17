<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Product;
use Illuminate\Support\Facades\DB;

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
            $table->integer('deleted')->default(0); 
                //0: not deleted && 1:Deleted.
            $table->string('image')->nullable();
            $table->timestamps();
        });
         // Full Text Index
        DB::statement('ALTER TABLE products ADD FULLTEXT search (name,brand)');
        
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
