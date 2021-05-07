<?php

namespace App\Http\Controllers;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index() {
        $user = Auth::user();
        $userDetails = $user->details;

        return view ('apply_form', ['user_details' => $userDetails]);
    }

    public function publish(Request $request) {
        $request->validate([
            'location' => 'required',
            'type_building' => 'required',
            'surface' => 'required',
            'budget' => 'required',
            'housemates' => 'required',
            'intro' => 'required',
            'start_date' => 'required',
        ]);

        $Application = new Application([
            "user_id" => Auth::id(),
            "location" => $request->input('location'),
            "type_house" => $request->input('type_building'),
            "surface" => $request->input('surface'),
            "budget" => $request->input('budget'),
            "housemates" => $request->input('housemates'),
            "intro" => $request->input('intro'),
            "start_date" => $request->input('start_date'),
        ]);

        $Application->save();

        return redirect('/');
    }
}
