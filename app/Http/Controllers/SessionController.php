<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Http\Resources\SessionResource;
use App\Events\SessionEvent;
use App\Events\PrivateChatEvent;
use App\Models\Connection;

class SessionController extends Controller
{
    public function create(Request $request)
    {
        // Create chat session if session doesn't exist else send message
        try {
            
            $session = Session::create(['user1_id' => auth()->id(), 'user2_id' => $request->poster_id]);
            $modifiedSession = new SessionResource($session);

            // Create connections for both users
            $connection_sender = Connection::create(['user_id' => auth()->id(), 'user2_id' => $request->poster_id] );
            $connection_receiver = Connection::create(['user2_id' => auth()->id(), 'user_id' => $request->poster_id] );
            
            try {
                broadcast(new SessionEvent($modifiedSession, auth()->id()));
            } catch (\GuzzleHttp\Exception\ConnectException $guzzleError) {

            }

        } catch (\Illuminate\Database\QueryException $e) {
            $session = Session::where('user1_id', auth()->id())->where('user2_id', $request->poster_id)->first();

            $message = $session->messages()->create([
                'content' => $request->message
            ]);
            
            
            $chat = $message->createForSend($session->id);

            $message->createForReceive($session->id, $request->poster_id);
            
            try {
                broadcast(new PrivateChatEvent($request->message, $chat));
            } catch (\GuzzleHttp\Exception\ConnectException $guzzleError) {
                
            }
        }

        if ( ! $e ) {
            $session = Session::where('user1_id', auth()->id())->where('user2_id', $request->poster_id)->first();

            $message = $session->messages()->create([
                'content' => $request->message
            ]);
            
            
            $chat = $message->createForSend($session->id);

            $message->createForReceive($session->id, $request->poster_id);
            
            try {
                broadcast(new PrivateChatEvent($request->message, $chat));
            } catch (\GuzzleHttp\Exception\ConnectException $guzzleError) {
                
            }
        }

        return response()->json('Bericht succesvol verzonden');
    }

}
