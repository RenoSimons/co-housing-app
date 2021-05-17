<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RentOffer;

class CoHousingController extends Controller
{
    public function index() {
        $rentOffers = RentOffer::get();

        return view('cohouses', ['rentoffers' => $rentOffers]);
    }
}
