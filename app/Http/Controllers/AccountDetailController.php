<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AccountDetail;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccountDetailController extends Controller
{
    public function index()
    {  
        $user = Auth::user();

        $loginDetails = [ $user->name , $user->email ];
        $userDetails = $user->details;

        return view('user_profile', 
            ['login_details' => $loginDetails], 
            ['user_details' => $userDetails]
        );
    }

    public function storeUserImage(Request $request) {
        $user = $request->user(); 

        // Remove previous profile picture
        $fileName = $user->details->where('user_id', $user->id)->pluck('img_url');
        Storage::disk('user_images')->delete($fileName[0]);
   
        // Check for file
        if ( !is_null ($request->file('file')) ) {
           
            // Generate laravel url
            $unique_photo_url = $request->file->hashName();
            
            $request->file->store('user_images', 'public');

            $affected = $user->details
            ->update(['img_url' => $unique_photo_url]);

            return back()->with('success','Profielfoto upload succes!');
        }

        return back()->with('error','Something went wrong');
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
}
