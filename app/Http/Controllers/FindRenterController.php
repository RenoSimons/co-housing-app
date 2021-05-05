<?php

namespace App\Http\Controllers;
use App\Models\RentOffer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FindRenterController extends Controller
{
    public function index() {
        return view ('find_renter_form');
    }

    public function publish(Request $request) {
        
        $validated = $request->validate([
            'title' => 'required',
            'region' => 'required',
            'city' => 'required',
            'type_building' => 'required',
            'surface' => 'required',
            'budget' => 'required',
            'housemates' => 'required',
            'start_date' => 'required',
            'description_house' => 'required',
            'description_mates' => 'required',
        ]);
        
        if ( !is_null ($request->file('photos')) ) {

            $photoUrls = [];

            // Loop over input pictures
            $files = $request->file('photos');
            foreach ($files as $key => $value) {
                $unique_photo_url = $value->hashName();
                $value->store('house_images', 'public');
                array_push($photoUrls, $unique_photo_url);
            }
        }

        $RentOffer = new RentOffer([
            "user_id" => Auth::id(),
            "title" => $request->input('title'),
            "province" => $request->input('region'),
            "city" => $request->input('city'),
            "surface" => $request->input('surface'),
            "budget" => $request->input('budget'),
            "housemates" => $request->input('housemates'),
            "intro" => $request->input('intro'),
            "start_date" => $request->input('start_date'),
            "house_description" => $request->input('description_house'),
            "housemates_description" => $request->input('description_mates'),
            "img_urls" => $photoUrls,
            ]);

        $RentOffer->save();
        


        return view ('home');
    }

    public function uploadPicture() {
        
    }
}
