<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AccountDetail;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PublicProfileController extends Controller
{
    public function showProfile($id) {

        // Get the user details
        $userName = User::where('id', $id)->select('name', 'created_at')->first();
        $userDetails = AccountDetail::where('user_id', $id)->get();

        return view('user_public_profile',
            ['username' => $userName],
            ['user_details' => $userDetails],  
        );
    }
    
}
