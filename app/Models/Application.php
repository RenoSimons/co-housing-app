<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Application extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'location',
        'type_house',
        'surface',
        'budget',
        'housemates',
        'start_date',
        'intro',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
