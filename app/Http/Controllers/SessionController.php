<?php

namespace App\Http\Controllers;
use App\Http\Controllers\NotificationController;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Http\Resources\SessionResource;
use App\Events\SessionEvent;
use App\Events\PrivateChatEvent;
use App\Models\Connection;
use Illuminate\Notifications\Notification;

class SessionController extends Controller
{
    public function create(Request $request)
    {
        $notifyController = new NotificationController;

        // Create chat session & send and if session doesn't exist just send message

        $session1 = Session::where('user1_id', auth()->id())->where('user2_id', $request->receiver_id)->first();
        $session2 = Session::where('user2_id', auth()->id())->where('user1_id', $request->receiver_id)->first();

        if ($session1 == null && $session2 == null) {
            $session = Session::create(['user1_id' => auth()->id(), 'user2_id' => $request->receiver_id]);
            
            $modifiedSession = new SessionResource($session);

            // Create connections for both users
            $connection_sender = Connection::create(['user_id' => auth()->id(), 'user2_id' => $request->receiver_id]);
            $connection_receiver = Connection::create(['user2_id' => auth()->id(), 'user_id' => $request->receiver_id, 'has_message' => 1]);
        
            $message = $session->messages()->create([
                'content' => $request->message
            ]);

            $updateMsgStatus = Connection::where('user2_id',  auth()->id())->where('user_id', $request->receiver_id)->update(['has_message' => 1]);

            $notifyController->makeNotification($request->receiver_id, auth()->id());

            $chat = $message->createForReceive($session->id, $request->receiver_id, auth()->id());

        } else {
            if ($session1 !== null) {
                $session = $session1;
                $user_has_msg_id = 'user1_id';
            }

            if ($session2 !== null) {
                $session = $session2;
            }
            
            $message = $session->messages()->create([
                'content' => $request->message
            ]);

            $updateMsgStatus = Connection::where('user2_id',  auth()->id())->where('user_id', $request->receiver_id)->update(['has_message' => 1]);
            //dd($session->id);
            // Make a notification
            $notifyController->makeNotification($request->receiver_id, auth()->id());

            $chat = $message->createForReceive($session->id, $request->receiver_id, auth()->id());
        }

        return response()->json('Bericht succesvol verzonden');
    }

}
