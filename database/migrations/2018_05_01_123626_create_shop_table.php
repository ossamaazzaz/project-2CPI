<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Shop;
class CreateShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        -------renken
        Settings :
        import / export
        Design :
        insert slide images
        Site :
        title ,desc, meta text ,logo
        about us (termes and conditions ,footer)
        social media links 
        */
        Schema::create('shop', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->string('link')->nullable();
            $table->string('email')->nullable();
            $table->string('terms')->nullable();
            $table->string('addr')->nullable();
            $table->string('phone_num')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('insta_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->text('quotes')->nullable();
            $table->string('slides')->nullable();
            $table->double('revenue')->default(0);
            $table->timestamps();
        });
        Shop::create([
            'name' => 'Eshop',
            'description' => 'the description of our website ,
some words',
            'link' => 'https://127.0.0.1:8000',
            'email' => 'eshoproject@email.com',
            'terms' => 'Our terms of Service are simple.',
            'addr' => 'Address',
            'phone_num' => '1234567890',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop');
    }
}
