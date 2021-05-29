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
            "gender" => $request->input('surface'),
            "budget" => $request->input('budget'),
            "age" => $request->input('housemates'),
            "start_date" => $request->input('start_date'),
            "intro" => $request->input('intro'),
        ]);

        $Application->save();

        return redirect('/');
    }
}
