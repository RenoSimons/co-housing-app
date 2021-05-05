<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AccountDetail;
use Illuminate\Support\Facades\Auth;

class PublicProfileController extends Controller
{
    public function showProfile($id) {

        // Get the user details
        $userName = User::where('id', $id)->pluck('name');
        $userDetails = AccountDetail::where('user_id', $id)->get();
        
        return view('user_public_profile',
            ['username' => $userName], 
            ['user_details' => $userDetails]
        );
    }
    
}
