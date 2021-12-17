<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->delete();
       DB::table('users')->insert([
        'name' => 'Abdullah',
        'email' =>'AbdullahHamdy@gmail.com',
        'password' => Hash::make(11111111),
    ]);
    }
}
