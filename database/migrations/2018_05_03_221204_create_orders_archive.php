<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersArchive extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_archive', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id');
            $table->string('faultofwho')->default('noOne');
            $table->string('sellercomment')->nullable();
            $table->string('buyercomment')->nullable();
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
        Schema::dropIfExists('orders_archive');

    }
}
