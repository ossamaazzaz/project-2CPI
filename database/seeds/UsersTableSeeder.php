<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('users')->insert([
            'username' => 'admin',
            'firstName' => 'the',
            'lastName' => 'Admin',
            'phoneNum' => '+213696411943',
            'adr' => '127.0.0.1',
            'idCard' => '00000000',
            'groupId' => 0,
            'approveState' => 'Approved',
            'email' => 'admin@email.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
