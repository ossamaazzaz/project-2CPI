<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateUsersTable extends Migration
{
    /* Run the migrations.
     *  
     *  groupId: 0 -> admin, 1 -> user
     *  approveState: pending,approved, declined
     *  TODO: wishlistID, favProductsID,postCode
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',15)->unique();
            $table->string('firstName',30);
            $table->string('lastName',30);
            $table->string('phoneNum',15);
            $table->string('email')->unique();
            $table->string('adr');
            $table->string('avatar')->default(`{{ asset('avatar.JPEG') }}`);
            $table->string('idCard')->unique(); // idCard should be unique
            $table->smallInteger('groupId')->default(1);
            $table->string('approveState')->default('pending');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
