<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCartsItemm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('cart_items', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('cart_id');
                $table->integer('product_id');
                $table->integer('quantity')->default('0');
                $table->integer('price')->default('0');

                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cart_items');
    }
}
