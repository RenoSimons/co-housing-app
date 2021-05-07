<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    public function index() {
        $applications = Application::get();

        return view('persons', ['applications' =>$applications]);
    }

    public function searchPersons(Request $request) {
        $location = $request->input('region');

        $type_house = $request->input('type_building');
        if ($type_house == 'Eender') {
            $type_house = null;
        }

        $surface = $request->input('surface');
        if ($surface == 'Eender') {
            $surface = null;
        }

        $housemates = $request->input('housemates');
        if ($housemates == 'Eender') {
            $housemates = null;
        }

        $budget = $request->input('budget');
        if ($budget == 'Eender') {
            $budget = null;
        }

        //dd($type_house);
        $applications = DB::table('applications')
            ->when($location, function ($query, $location) {
                return $query->where('location', $location);
            })
            ->when($type_house, function ($query, $type_house) {
                return $query->where('type_house', $type_house);
            })
            ->when($surface, function ($query, $surface) {
                return $query->where('surface', $surface);
            })
            ->when($housemates, function ($query, $housemates) {
                return $query->where('housemates', $housemates);
            })
            ->when($budget, function ($query, $budget) {
                return $query->where('budget', $budget);
            })
            
            ->get();
        //dd($applications);
        return view('persons', ['applications' =>$applications]);
    }
}
