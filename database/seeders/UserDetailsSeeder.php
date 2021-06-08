<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $birthplaces = ['Antwerpen', 'Brugge', 'Gent', 'Brussel', 'Leuven', 'Luik', 'Bergen', 'Namen'];
        $img_url = 'https://loremflickr.com/320/240/person';
        $status = ['Student', 'Werzoekende', 'Werknemer'];
        $intro = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deserunt accusantium sit possimus enim vitae mollitia, alias beatae molestias quaerat, doloremque et. Dolorum consequatur, tenetur distinctio rem quis praesentium repudiandae facilis.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deserunt accusantium sit possimus enim vitae mollitia, alias beatae molestias quaerat, doloremque et. Dolorum consequatur, tenetur distinctio rem quis praesentium repudiandae facilis. ';

        for ($i=1; $i < 20; $i++) {
            DB::table('account_details')->insert([
                'user_id' => $i,
                'birthplace' => $birthplaces[rand(0, count($birthplaces)-1)],
                'insta_link' => 'https://www.instagram.com/netskyofficial/?hl=nl',
                'fb_link' => 'https://www.facebook.com/groups/781008485257747?sorting_setting=CHRONOLOGICAL',
                'intro_text' => $intro,
                'hobby_text' => $intro,
                'status' => $status[rand(0, count($status)-1)],
                'img_url' => 'https://loremflickr.com/320/240/person',
                'is_private' => 0
            ]);
        }
    }
}
