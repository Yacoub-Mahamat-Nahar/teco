<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class Message extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'chat_room' => $this->chat_room,
            'sender' => new User($this->getSender($this->sender)),
            'receiver' => new User($this->getReceiver($this->receiver)),
            'contenu' => $this->contenu,
            'slug' => $this->slug,
            'status' => $this->status,
            'is_mine' => $this->is_mine,
            'created_at' => Carbon::parse($this->created_at)->diffForHumans()

        ];
    }
}
