<?php

namespace App\Http\Controllers;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function index() {
        $user = Auth::user();
        $userDetails = $user->details;
        $has_application = Application::where('user_id', $user->id)->first();

        return view ('apply_form', ['user_details' => $userDetails, 'user_has_application' => $has_application]);
    }

    public function publish(Request $request) {
        $request->validate([
            'location' => 'required',
            'type_building' => 'required',
            'gender' => 'required',
            'budget' => 'required',
            'age' => 'required',
            'intro' => 'required',
            'start_date' => 'required',
        ]);

        $Application = new Application([
            "user_id" => Auth::id(),
            "location" => $request->input('location'),
            "type_house" => $request->input('type_building'),
            "gender" => $request->input('gender'),
            "budget" => $request->input('budget'),
            "age" => $request->input('age'),
            "start_date" => $request->input('start_date'),
            "intro" => $request->input('intro'),
        ]);

        $Application->save();

        // Remove previous profile picture
        $user = $request->user(); 

        $fileName = $user->details->where('user_id', $user->id)->pluck('img_url');
        Storage::disk('user_images')->delete($fileName[0]);
   
        // Check for file
        if ( !is_null ($request->file('file')) ) {
           
            // Generate laravel url
            $unique_photo_url = $request->file->hashName();
            
            $request->file->store('user_images', 'public');

            $affected = $user->details
            ->update(['img_url' => $unique_photo_url]);
        }

       

        return redirect('/myapplications');
    }

    public function edit(Request $request) {
        $affected = DB::table('applications')
              ->where('user_id', Auth::id())
              ->update([
                  'location' => $request->location,
                  'type_house' => $request->type_building,
                  'gender' => $request->gender,
                  'budget' => $request->budget,
                  'age' => $request->age,
                  'start_date' => $request->start_date,
                  'intro' => $request->intro,
              ]);
        return response()->json('Post succesvol aangepast');
    }

    public function delete(Request $request) {
        $affected = DB::table('applications')
            ->where('user_id' , Auth::id())
            ->delete();

            return response()->json('Post succesvol verwijderd');
    }
}
