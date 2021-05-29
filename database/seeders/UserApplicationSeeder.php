<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = ['Antwerpen', 'Brugge', 'Gent', 'Brussel', 'Leuven', 'Luik', 'Bergen', 'Namen'];
        $budgets = ['200-300', '300-400', '400-500', '500-600', 'Eender'];
        $types = ['Eender', 'Appartement', 'Huis', 'Duplex'];
        $intro = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deserunt accusantium sit possimus enim vitae mollitia, alias beatae molestias quaerat, doloremque et. Dolorum consequatur, tenetur distinctio rem quis praesentium repudiandae facilis.';
        
        for($i=0; $i <= 20; $i++) {
            DB::table('applications')->insert([
                'user_id' => "2",
                'location' => $locations[rand(0, count($locations)-1)],
                'type_house' => $types[rand(0, count($types)-1)],
                'budget' => $budgets[rand(0, count($budgets)-1)],
                'age' => 20,
                'gender' => 'Man',
                'intro' => $intro,
                'start_date' => '19-05-2021',
            ]);
        }
    }
}
