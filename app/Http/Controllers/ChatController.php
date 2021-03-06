<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MsgReadEvent;
use App\Events\PrivateChatEvent;
use App\Http\Resources\ChatResource;
use App\Models\Session;
use App\Models\Connection;
use Carbon\Carbon;

use App\Events\MessageSent;

class ChatController extends Controller
{
    public function send(Session $session, Request $request)
    {
        $message = $session->messages()->create([
            'content' => $request->message
        ]);

        $chat = $message->createForReceive($session->id, $request->to_user, auth()->id());
        
        //broadcast(new PrivateChatEvent($message->content, $chat));

        return response($chat->id, 200);
    }

    public function chats(Session $session)
    {
        //dd($session->id);
        return ChatResource::collection($session->chats->where('session_id', $session->id));

    }

    public function read(Session $session)
    {
        $chats = $session->chats->where('read_at', null)->where('type', 0)->where('user_id', '!=', auth()->id());

        foreach ($chats as $chat) {
            $chat->update(['read_at' => Carbon::now()]);
            //broadcast(new MsgReadEvent(new ChatResource($chat), $chat->session_id));
        }
    }

    public function clear(Session $session)
    {
        $session->deleteChats();
        $session->chats->count() == 0 ? $session->deleteMessages() : '';
        return response('cleared', 200);
    }

    public function markRead(Request $request) {
        $updateMsgStatus = Connection::where('user2_id',  auth()->id())->where('user_id', $request->friend_id)->update(['has_message' => 0]);
    }
}
