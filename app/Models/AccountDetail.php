<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AccountDetail extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'birthplace',
        'fb_link',
        'insta_link',
        'intro_text',
        'hobby_text',
        'status',
        'img_url',
        'is_private'
    ];
}
