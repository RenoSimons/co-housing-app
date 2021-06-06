<?php

namespace App\Http\Controllers;
use App\Models\RentOffer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class FindRenterController extends Controller
{
    public function index() {
        return view ('find_renter_form');
    }

    public function publish(Request $request) {
        
        $validated = $request->validate([
            'title' => 'required',
            'region' => 'required',
            'street' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'type_building' => 'required',
            'surface' => 'required',
            'budget' => 'required',
            'housemates' => 'required',
            'start_date' => 'required',
            'description_house' => 'required',
            'description_mates' => 'required',
            'toilet' => 'required',
            'kitchen' => 'required',
            'own_bathroom' => 'required',
            'pets' => 'required',
            'washing_machine' => 'required',
            'wifi' => 'required'
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
            "street" => $request->input('street'),
            "lat" => $request->input('lat'),
            "long" => $request->input('long'),
            "type_house" => $request->input('type_building'),
            "surface" => $request->input('surface'),
            "budget" => $request->input('budget'),
            "housemates" => $request->input('housemates'),
            "start_date" => $request->input('start_date'),
            "house_description" => $request->input('description_house'),
            "housemates_description" => $request->input('description_mates'),
            "own_toilet" => $request->input('toilet'),
            "shared_kitchen" => $request->input('kitchen'),
            "own_bathroom" => $request->input('own_bathroom'),
            "pets" => $request->input('pets'),
            "washing_machine" => $request->input('washing_machine'),
            "wifi" => $request->input('wifi'),
            "views" => 10,
            "img_urls" => $photoUrls,
        ]);

        $RentOffer->save();
        
        return redirect('/myapplications');
    }

    public function edit(Request $request) {
        $affected = DB::table('rent_offers')
              ->where('id', $request->id)
              ->update([
                    "title" => $request->title,
                    "province" => $request->province,
                    "street" => $request->street,
                    "lat" => $request->lat,
                    "long" => $request->long,
                    "type_house" => $request->type_house,
                    "surface" => $request->surface,
                    "budget" => $request->budget,
                    "housemates" => $request->housemates,
                    "start_date" => $request->start_date,
                    "house_description" => $request->house_description,
                    "housemates_description" => $request->housemates_description,
                    "own_toilet" => $request->own_toilet,
                    "shared_kitchen" => $request->shared_kitchen,
                    "own_bathroom" => $request->own_bathroom,
                    "pets" => $request->pets,
                    "washing_machine" => $request->washing_machine,
                    "wifi" => $request->wifi,
              ]);
             
        return response()->json('Post succesvol aangepast');
    }

    public function delete(Request $request) {
        $affected = DB::table('rent_offers')
            ->where('id' , $request->id)
            ->delete();

        return response()->json('Post succesvol verwijderd');
    }
}

