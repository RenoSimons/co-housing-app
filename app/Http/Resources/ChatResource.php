<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'message' => $this->message['content'],
            'id' => $this->id,
            'user_id' => $this->user_id,
            'user2_id' => $this->user2_id,
            'read_at' => $this->read_at_timing($this),
            'send_at' => $this->created_at->diffForHumans()
        ];
    }
    private function read_at_timing($_this)
    {
        $read_at = $_this->type == 0 ? $_this->read_at : null;
        return $read_at ? $read_at->diffForHumans() : null;
    }
}