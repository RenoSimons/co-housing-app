<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   for ($i=1; $i < 20; $i++) {
            DB::table('users')->insert([
                'name' => "User" . $i,
                'email' => 'user@user' . $i .'com',
                'password' => Hash::make('password'),
            ]);
        }
    }
}
