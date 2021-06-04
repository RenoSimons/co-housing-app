<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\SessionResource;
use App\Http\Resources\UserResource;
use App\Events\SessionEvent;
use App\Models\User;
use App\Models\Session;
use App\Models\Connection;

class AccountController extends Controller
{
    public function showFavorites() {
        $user_favorite_ids = DB::table('favorites')->where('user_id', Auth::id())->pluck('offer_id');
        $favorited_offers = [];

        foreach ($user_favorite_ids as $id) {
            array_push($favorited_offers, DB::table('rent_offers')->where('id', $id)->get()->toArray()); 
        }

        //dd($favorited_offers);

        return view('myFavorites', ['favorites' => $favorited_offers, 'favorite_ids' => $user_favorite_ids]);
    }

    public function showMyApplications() {
        return view('myApplications');
    }

    public function chat()
    {
        return view('myMessages');
    }

    public function getFriends(Request $request)
    {
        $user_id = $request->user()->id;
        $connection_ids = Connection::where('user_id', $user_id)->pluck('user2_id');
        $connections = User::whereIn('id', $connection_ids)->get();

        return UserResource::collection($connections);
        //return response()->json($connections);
    }

    public function getUser(Request $request) {
        return response()->json($request->user());
    }

}
