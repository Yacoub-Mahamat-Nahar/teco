<?php

namespace App\Http\Controllers;

use App\ChatOnline;
use App\Message;
use Illuminate\Http\Request;
use App\Http\Resources\Message as MessageResource;
use App\User;
use DB;

class MessageController extends Controller
{
    private $parsed;

    public function index()
    {
        $authentificated = auth()->user()->id;
        $joueurs = User::where('id','<>',$authentificated)->orderBy('first_name','asc')->get();

       $messages = MessageResource::collection(
       Message::where('receiver', $authentificated)
                ->where('sender', '<>', $authentificated)
                ->orderBy("id", "asc")
                ->take(30)
                ->get()
            );
       setLog(Message::class,'Chargement des messages inbox');

       return response()->json(['messages' => $messages,'joueurs' => $joueurs]);

    }

    public function indexToPrivate()
    {
       $this->parsed = auth()->user()->id;

       $messages = MessageResource::collection( Message::where([
        ['receiver','=', $this->parsed],
        ['chat_room','=', 3],

        ])->orWhere(function($query) {
                    $query->where([
                        ['sender', $this->parsed],
                        ['chat_room','=', 3]
                    ]);
        }) ->orderBy("id", "asc")->get());
      // $messages =   ;
        $senders_mi = [];
        $receivers_mi = [];

        foreach ($messages as $key ) {
           if ($key->sender == $this->parsed) {
               array_push($senders_mi,$key);
           }else if($key->receiver == $this->parsed){
               array_push($receivers_mi,$key);
           }
        }
       setLog(Message::class,'Chargement des messages');

       return response()->json([
           'sended_messages' => $senders_mi,
           'received_messages' => $receivers_mi]);

    }



    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Message $message) {
        setLog(Message::class,'Chargement des messages');

        return response()->json($message->orderBy("created_at", "DESC")->take(5)->get());
    }


    public function messageToForum($forum)
    {
       $messages = MessageResource::collection(Message::where(['chat_online' => $forum])->orderBy("id", "asc")->take(100)->get());
       $chat_online = ChatOnline::where('id',$forum)->first();
       setLog(Message::class,'Chargement des messages du forum '.$chat_online->nom);

       return response()->json(['messages' => $messages]);

    }


    public function messageToPrivate($sender)
    {
       $authentificated = auth()->user()->id;
       $this->parsed =  (integer)$sender;
       $messages = MessageResource::collection(Message::where([
            ['sender','=' , $this->parsed],
            ['receiver','=',$authentificated]
       ])->orWhere(function($query) {
                   $query->where('sender',  auth()->user()->id)
                         ->where('receiver', $this->parsed);
       }) ->orderBy("id", "asc")->take(30)->get());
       setLog(Message::class,'Chargement des messages');

       return response()->json(['messages' => $messages]);

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
    public function storeFromForum(Request $request)
    {
        $data = [
            'sender' => $request->sender,
            'contenu' => $request->contenu,
            'slug' => 'message-'.str_randomize(70),
            'is_mine' => $request->is_mine,
            'chat_online' => $request->chat_online
        ];
        $chat_online = ChatOnline::where('id',$request->chat_online)->first();

        if (Message::create($data)) {
            setLog(Message::class,'Envoie d\'un message dans le forum '.$chat_online->nom);

            return response()->json(
                [
                    'message' => 'Envoyé',
                    'status' => true
                ]
                );
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFromPrivate(Request $request)
    {
        $data = [
            'sender' => $request->sender,
            'receiver' => $request->receiver,
            'contenu' => $request->contenu,
            'slug' => 'message-'.str_randomize(70),
            'is_mine' => $request->is_mine,
            'chat_room' => 3
        ];


        if (Message::create($data)) {
            $receiver = User::find($data['receiver']);
            setLog(Message::class,'Envoie d\'un message à '.$receiver->first_name.' '.$receiver->last_name);

            return response()->json(
                [
                    'message' => 'Envoyé',
                    'status' => true
                ]
                );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }


    public function chat()
    {
        $connected = auth()->user()->id;
        setLog(Message::class,'Accès au chat ');

        return view('backend.chat.index');
    }
}
