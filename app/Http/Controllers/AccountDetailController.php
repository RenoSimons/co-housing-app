<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AccountDetailController extends Controller
{
    public function index()
    {   
        // Check if the user already has a data row
        $user = Auth::user();

        if ( ! $this->checkIfRowExists($user) ) {
            $affected = UserDetails::create([
                'user_id' => Auth::id(),
            ]);
    
            $affected->save();
        }
        
        $loginDetails = [ $user->name , $user->email ];
        $userDetails = $user->details;
        dd($userDetails->birthplace);
        return view('user_profile', 
            ['login_details' => $loginDetails], 
            ['user_details' => $userDetails]
        );
    }

    public function updateBirthPlace (Request $request) {

        $user = $request->user();
        
        $request->validate([
            'birthplace' => 'required',
        ]);

        $affected = $user->details
        ->update([
            "birthplace" => $request->input('birthplace'),
         ]);

        return back()->with('success','Geboorteplaats update succes!');
    }

    public function updateIntroText(Request $request) {

        $user = $request->user(); 

        $request->validate([
            'intro_text' => 'required',
        ]);

        $affected = $user->details
        ->update([
            "intro_text" => $request->input('intro_text'),
        ]);

        return back()->with('success','Intro text update succes!');
    }

    public function updateHobbies (Request $request) {

        $user = $request->user(); 

        $request->validate([
            'hobbies' => 'required',
        ]);

        $affected = $user->details
        ->update([
            "hobby_text" => $request->input('hobbies'),
        ]);

        return back()->with('success','Hobbies & interesses update succes!');
    }

    public function updateStatus (Request $request) {

        $user = $request->user(); 

        $request->validate([
            'status' => 'required',
        ]);

        $affected = $user->details
        ->update([
            "status" => $request->input('status'),
        ]);

        return back()->with('success','Status update succes!');
    }

    public function checkIfRowExists ($user) {
        $affected = $user->details;

        return $affected;
    }
}
