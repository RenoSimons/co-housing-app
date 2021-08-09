<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class favoriteController extends Controller
{
    public function favoritePost(Request $request) {
        $user = $request->user();
        $check = $user->favorites->where('offer_id', '=', $request->id)->first();
        
        if( ! $check) {
            // Save if not favorited
            DB::table('favorites')->insert([
                "user_id" => Auth::id(),
                "offer_id" => $request->id,
            ]);
            $isFavorited = true;

        } else {
            // Remove if favorited
            DB::table('favorites')->where('offer_id', $request->id)->delete();
            $isFavorited = false;
        }
       
        return response()->json([$request->id, $isFavorited]);
    }
}
