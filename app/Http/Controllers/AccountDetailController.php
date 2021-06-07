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

    public function togglePrivate(Request $request) {
        $user = $request->user();
        $affected = $user->details;

        $affected
        ->update([
            "is_private" => intval($request->is_private),
        ]);

        return response()->json($request->is_private);
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

    public function updateDetails (Request $request) {

        $user = $request->user();

        $affected = $user->details;

        if (strlen($request->insta_link) > 0 ) {
            $affected
            ->update([
                "insta_link" => $request->insta_link,
             ]);
        }

        if (strlen($request->fb_link) > 0) {
            $affected
            ->update([
                "fb_link" => $request->fb_link,
            ]);
        }
        
        if (strlen($request->birthplace) > 0) {
            $affected
            ->update([
                "birthplace" => $request->birthplace,
            ]);
        }

        return response()->json("Gegevens succesvol gewijzigd");
    }

    public function updateIntroText(Request $request) {

        $user = $request->user(); 

        $affected = $user->details
        ->update([
            "intro_text" => $request->intro_text,
        ]);

        return response()->json("Intro text succesvol gewijzigd");
    }

    public function updateHobbies (Request $request) {

        $user = $request->user(); 

        $affected = $user->details
        ->update([
            "hobby_text" => $request->hobby_text,
        ]);
        
        return response()->json("Hobby's & interesses update succes!");
    }

    public function updateStatus (Request $request) {

        $user = $request->user(); 

        $affected = $user->details
        ->update([
            "status" => $request->status,
        ]);

        return response()->json('Status update succes!');
    }
}
