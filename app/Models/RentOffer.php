<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'start_date',
        'province',
        'street',
        'lat', 
        'long',
        'type_house',
        'surface',
        'budget',
        'housemates',
        'house_description',
        'housemates_description',
        'views',
        'own_toilet',
        'shared_kitchen',
        'own_bathroom',
        'pets',
        'washing_machine',
        'wifi',
        'img_urls',
    ];

    protected $casts = [
        'img_urls' => 'array'
    ];
}
