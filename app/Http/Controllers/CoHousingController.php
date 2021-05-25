<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RentOffer;
use Illuminate\Support\Facades\DB;


class CoHousingController extends Controller
{
    public function index() {
        $rentOffers = RentOffer::get();

        return view('cohouses', ['rentoffers' => $rentOffers]);
    }

    public function searchHouses(Request $request) {
        $location = $request->input('region');
        if ($location == 'Eender') {
            $location = null;
        }

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

        $rentOffers = RentOffer::query()
            ->when($location, function ($query, $location) {
                return $query->where('province', $location);
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
        
            return view('cohouses', ['rentoffers' => $rentOffers]);
    }

    public function showHouseDetail($id) {
        return view('cohouse_detail');
    }
}
