<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetails;

use Illuminate\Http\Request;

class AccountDetailController extends Controller
{
    public function index()
    {   
        return view('user_profile');
    }

    public function store (Request $request) {
        dd($request);
    }
}
