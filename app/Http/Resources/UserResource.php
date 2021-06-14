<?php

namespace App\Http\Resources;

use App\Models\User;
use App\Models\Session;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'has_unread_message' => $this->has_messages($this->id),
            'online' => false,
            'session' => $this->session_details($this->id),
            'image' => $this->image,
        ];
    }
    private function session_details($id)
    {
        $session = Session::whereIn('user1_id', [auth()->id(), $id])->whereIn('user2_id', [auth()->id(), $id])->first();
        //$session = Session::whereIn('user1_id', [auth()->id(), $id])->orWhereIn('user2_id', [auth()->id(), $id])->first();

        return new SessionResource($session);
    }

    private function has_messages($id)
    {
        $users = User::where('id', $id)->get();
        dd("test");

        return $users[0]->connections[0]->has_message;
    }
}