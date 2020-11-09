<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatOnline extends JsonResource
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
            'nom' => $this->nom,
            'message_room' => $this->message_room,
            'slug' => $this->slug,
            'status' => $this->status,
            'created_at' => Carbon::parse($this->created_at)->diffForHumans()

        ];
    }
}
