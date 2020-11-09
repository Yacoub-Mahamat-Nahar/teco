<?php

use App\ChatOnline;
use Illuminate\Database\Seeder;

class ChatOnlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       ChatOnline::create([
           'nom' => 'Debat sur le livre Jonh Le Rouge',
           'message_room' => 1,
           'slug' => 'chat-online'.str_randomize(20),
           'statut' => true
           ]);
    }
}
