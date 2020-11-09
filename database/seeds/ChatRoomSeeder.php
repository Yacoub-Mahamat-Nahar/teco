<?php

use App\MessageRoom;
use Illuminate\Database\Seeder;

class ChatRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       MessageRoom::create([
         'nom' => 'Forum',
         'description' => '',
          'slug' => 'chat-room'.str_randomize(10)
       ]);

       MessageRoom::create([
        'nom' => 'Groupe Message',
        'description' => '',
         'slug' => 'chat-room'.str_randomize(10)
      ]);


      MessageRoom::create([
        'nom' => 'Private',
        'description' => '',
         'slug' => 'chat-room'.str_randomize(10)
      ]);

    }
}
