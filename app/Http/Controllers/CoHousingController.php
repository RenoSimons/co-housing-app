<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RentOffer;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use Illuminate\Support\Facades\DB;

class CoHousingController extends Controller
{
    public function index() {
        $rentOffers = RentOffer::get();

        return view('cohouses', ['rentoffers' => $rentOffers]);
    }

    public function favoritePost(Request $request) {
        $user = $request->user();

        // Check if user has favorited this post
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
