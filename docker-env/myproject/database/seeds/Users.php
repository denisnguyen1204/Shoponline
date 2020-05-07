<?php

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'nguyenbanguyen1204@gmail.com',
            'phone_number' => '0932805658',
            'address' => '1/50 Thanh Đa',
            'level' => 3,
            'password' => bcrypt(12345678),
        ]);
    }
}
