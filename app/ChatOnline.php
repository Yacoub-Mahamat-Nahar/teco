<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChatOnline extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'chat_onlines';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nom', 'message_room', 'slug','statut'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
