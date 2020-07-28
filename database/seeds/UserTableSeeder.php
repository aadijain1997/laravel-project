<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class UserTableSeeder extends Seeder
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
            'name' => 'aditya',
            'email' => 'adityajainmks@gmail.com',
            'password' => Hash::make('aditya7'),
            'remember_token' =>Str::random(60),
            'role' =>  1,
            ],
            [
                'name' => 'ashish',
                'email' => 'jain.ashish@gmail.com',
                'password' => Hash::make('ashish7'),
                'remember_token' =>Str::random(60),
                'role' =>  3,
            ],
            [
                'name' => 'ankit',
                'email' => 'ankit@gmail.com',
                'password' => Hash::make('ankit7'),
                'remember_token' =>Str::random(60),
                'role' =>  4,
            ]
        ]);
    }
}
