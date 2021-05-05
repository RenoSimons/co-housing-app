<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Auth;

class PublicProfileController extends Controller
{
    public function showProfile() {
        return view('user_public_profile');
    }
    
}
