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
        if ($location == 'Eender') {
            $location = null;
        }

        $type_house = $request->input('type_building');
        if ($type_house == 'Eender') {
            $type_house = null;
        }
        
        $type_house = $request->input('type_building');
        if ($type_house == 'Eender') {
            $type_house = null;
        }

        $gender = $request->input('gender');
        if ($gender == 'Eender') {
            $gender = null;
        }

        $age = $request->input('age');
        if ($age == 'Eender') {
            $age = null;
        }

        $budget = $request->input('budget');
        if ($budget == 'Eender') {
            $budget = null;
        }

        $applications = DB::table('applications')
            ->when($location, function ($query, $location) {
                return $query->where('location', $location);
            })
            ->when($type_house, function ($query, $type_house) {
                return $query->where('type_house', $type_house);
            })
            ->when($gender, function ($query, $gender) {
                return $query->where('gender', $gender);
            })
            ->when($age, function ($query, $age) {
                return $query->where('age', $age);
            })
            ->when($budget, function ($query, $budget) {
                return $query->where('budget', $budget);
            })
            
            ->get();

        return view('persons', ['applications' =>$applications]);
    }
}
