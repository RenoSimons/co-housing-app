<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\UserResource;
use App\Models\User;

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

    public function getFriends()
    {
        return UserResource::collection(User::where('id','!=', auth()->id())->get());
    }
}
