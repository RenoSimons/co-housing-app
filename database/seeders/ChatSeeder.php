<?php

use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Session::create([
            'user1_id' => '3',
            'user2_id' => '1',
        ]);

        \App\Models\Message::create([
            'content' => 'Hello, can you hear me?',
            'session_id' => '1',
        ]);
        \App\Models\Message::create([
            'content' => 'Hey human!',
            'session_id' => '1',
        ]);
        \App\Models\Message::create([
            'content' => 'When we were younger and free... love this song) woof',
            'session_id' => '1',
        ]);

        \App\Models\Chat::create([
            'message_id' => '1',
            'session_id' => '1',
            'user_id' => '3',
            'type' => 0
        ]);

        \App\Models\Chat::create([
            'message_id' => '1',
            'session_id' => '1',
            'user_id' => '1',
            'type' => 1
        ]);


        \App\Models\Chat::create([
            'message_id' => '2',
            'session_id' => '1',
            'user_id' => '1',
            'type' => 1
        ]);

        \App\Models\Chat::create([
            'message_id' => '2',
            'session_id' => '1',
            'user_id' => '3',
            'type' => 0
        ]);

        \App\Models\Chat::create([
            'message_id' => '3',
            'session_id' => '1',
            'user_id' => '1',
            'type' =>  1
        ]);
        \App\Models\Chat::create([
            'message_id' => '3',
            'session_id' => '1',
            'user_id' => '3',
            'type' => 0
        ]);


    }
}