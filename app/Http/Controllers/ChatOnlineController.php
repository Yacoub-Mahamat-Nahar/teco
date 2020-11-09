<?php

namespace App\Http\Controllers;

use App\ChatOnline;
use Illuminate\Http\Request;
use App\Http\Resources\ChatOnline as Resource;

class ChatOnlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $available_chat = Resource::collection(ChatOnline::where(['message_room' => 1,'statut' => true])->get());
        setLog(ChatOnline::class,'Accès à la liste des sujets du forum');

        return response()->json(['available_chat' => $available_chat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'nom' => $request->nom,
            'message_room' => 1,
            'slug' => 'chat-online'.str_randomize(20),
            'statut' => 1
            ];


            if (ChatOnline::create($data)) {
                setLog(ChatOnline::class,'Creation d\'un nouveau sujet au forum');
                return response()->json(['message' => 'Le sujet a été ajoué au forum avec succès', 'status'=> true]);

              }
              return response()->json(['message' => 'Erruer , réessayer SVP!', 'status'=> false]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ChatOnline  $chatOnline
     * @return \Illuminate\Http\Response
     */
    public function show(ChatOnline $chatOnline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ChatOnline  $chatOnline
     * @return \Illuminate\Http\Response
     */
    public function edit(ChatOnline $chatOnline)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ChatOnline  $chatOnline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChatOnline $chatOnline)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ChatOnline  $chatOnline
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChatOnline $chatOnline)
    {
        //
    }
}
