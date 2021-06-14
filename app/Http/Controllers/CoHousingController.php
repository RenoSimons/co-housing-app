<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Session;
use App\Models\AccountDetail;
use App\Models\RentOffer;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


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
            $minSurface = null;
            $maxSurface = null;
        } else {
            //Get the boundaries
            if ($surface == '> 50m²') {
                $minSurface = 50;
                $maxSurface = 100000;
            } else {
                $surface = explode(" ", $surface);
                $minSurface = intval($surface[0]);
                $maxSurface = intval(explode("m", $surface[2])[0]);
            }
        }

        $housemates = $request->input('housemates');
        if ($housemates == 'Eender') {
            $housemates = null;
        }

        $budget = $request->input('budget');
        if ($budget == 'Eender') {
            $budget = null;
            $minBudget = null;
            $maxBudget = null;
        } else {
            if ($budget == '> €600') {
                $minBudget = 600;
                $maxBudget = 100000;
            } else {
                $budget = explode('-', $budget);
                $minBudget = explode('€', $budget[0])[1];
                $maxBudget = $budget[1];
            }
        }

        $rentOffers = RentOffer::query()
            ->when($location, function ($query, $location) {
                return $query->where('province', $location);
            })
            ->when($type_house, function ($query, $type_house) {
                return $query->where('type_house', $type_house);
            })
            ->when($surface, function ($query) use ($maxSurface, $minSurface) {
                return $query->where('surface', '<=', $maxSurface)->where('surface','>=', $minSurface);
            })
            ->when($housemates, function ($query, $housemates) {
                return $query->where('housemates', $housemates);
            })
            ->when($budget, function ($query) use ($minBudget, $maxBudget) {
                return $query->where('budget','<=', $maxBudget)->where('budget','>=', $minBudget);
            })
            ->get();

        return view('cohouses', ['rentoffers' => $rentOffers]);
      
    }

    public function showHouseDetail(Request $request, $id) {
        $house_details = DB::table('rent_offers')->where('id', $id)->first();
        $poster = DB::table('users')->where('id', $house_details->user_id)->first();
        $poster_details = AccountDetail::where('user_id', $house_details->user_id)->first();
        
        // Format dates
        $poster->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $poster->created_at)->format('d-m-Y');
        $house_details->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $house_details->created_at)->format('d-m-Y');
        
        // Update view counter
        $newViewCount = $house_details->views;
        $newViewCount++;

        // Check if the poster and viewer have a chat connection
        $sessionCheck1 = Session::where('user1_id', $poster->id)->where('user2_id', auth()->id())->first();
        $sessionCheck2 = Session::where('user2_id', $poster->id)->where('user1_id', auth()->id())->first();
        
        $has_session = 'false';

        if($sessionCheck1 !== null) {
            $has_session = 'true';
        } 

        if($sessionCheck2 !== null) {
            $has_session = 'true';
        }

        DB::table('rent_offers')->where('id', $id)->update(['views' => $newViewCount]);

        return view('cohouse_detail', ['house_details' => $house_details, 'poster' => $poster, 'poster_details' => $poster_details, 'has_session' => $has_session] );
    }

    public function getImages(Request $request) {
        $images = DB::table('rent_offers')->where('id', $request->id)->get('img_urls');
        
        return response()->json($images);
    }
}
