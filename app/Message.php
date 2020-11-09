<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'messages';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['sender', 'receiver', 'chat_online', 'contenu','slug','status','is_mine','chat_room'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function getSender($id)
    {
        return User::where('id',$id)->first();
    }

    public function getReceiver($id)
    {
        return User::where('id',$id)->first();
    }


    public function getChatOnLine()
    {
        return $this->belongsTo(ChatOnline::class, 'chat_online');
    }
}
