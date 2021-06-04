<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "user",
            'email' => "user@user.com",
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => "reno simons",
            'email' => "reno@skynet.be",
            'password' => Hash::make('password'),
            'created_at' => '2021-06-03 15:44:25'
        ]);

        DB::table('account_details')->insert([
            'user_id' => "2",
            'birthplace' => "",
            'intro_text' => "",
            'hobby_text' => "",
            'status' => "",
            'img_url' => "",
        ]);

        DB::table('users')->insert([
            'name' => "bryan geunens",
            'email' => "bryan@bryan.be",
            'password' => Hash::make('password'),
            'created_at' => '2021-06-03 15:44:25'
        ]);

        DB::table('account_details')->insert([
            'user_id' => "3",
            'birthplace' => "",
            'intro_text' => "",
            'hobby_text' => "",
            'status' => "",
            'img_url' => "",
        ]);

    }
}
