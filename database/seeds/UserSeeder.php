<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'name' => 'nikhil jain',
            'email' => 'nikhil@gmail.com',
            'password' => Hash::make('nikhil7'),
            'remember_token' =>Str::random(60),
            'role' =>  'admin',
            ]
        ]);
    }
}
