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
        'city',
        'type_house',
        'surface',
        'budget',
        'housemates',
        'house_description',
        'housemates_description',
        'views',
        'img_urls',
    ];

    protected $casts = [
        'img_urls' => 'array'
    ];
}
