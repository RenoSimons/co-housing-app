<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function makeNotification($receiverId, $senderId) {
        $senderName = DB::table('users')->where('id', $senderId)->select('name')->first();
        $message = "Je hebt een nieuw bericht van " . $senderName->name;

        DB::table('notifications')->insert([
            'user_id' => $receiverId,
            'message' => $message,
            'has_read' => 0,
        ]);
    }

    public function getNotificationCount() {
        $count = count(DB::table('notifications')->where('user_id', auth()->id())->get());

        return response()->json($count);
    }

    public function getNotifications() {
        $notifications = DB::table('notifications')->where('user_id', auth()->id())->get();

        return response()->json($notifications);
    }

    public function clearNotifications(Request $request) {
        $notifications = DB::table('notifications')->where('user_id', auth()->id())->delete();
    }


}
