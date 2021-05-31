<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getCoordinates() {
        $house_coordinates = DB::table('rent_offers')
        ->select('lat', 'long', 'id')
        ->get();

        return response()->json($house_coordinates);
    }

    public function getMarkerData(Request $request) {;
        $img_data = DB::table('rent_offers')
        ->where('id', $request->id)
        ->select('img_urls')
        ->get();

        $text_data = DB::table('rent_offers')
        ->where('id', $request->id)
        ->select('street', 'type_house', 'budget', 'housemates', 'start_date', 'title', 'id')
        ->get();

        return response()->json([$img_data, $text_data]);
    }
}
