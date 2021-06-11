<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\AccountDetail;
use App\Models\Application;
use App\Models\RentOffer;
use App\Models\Favorite;
use App\Models\Message;
use App\Models\Connection;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function details()
    {
        return $this->hasOne(AccountDetail::class);
    }

    public function application()
    {
        return $this->hasOne(Application::class);
    }

    public function offers()
    {
        return $this->hasMany(RentOffer::class);
    }

    public function avatar() {
        return $this->details->img_url;
    }

    public function favorites() {
        return $this->hasMany(Favorite::class);
    }

    public function connections() {
        return $this->hasMany(Connection::class);
    }

    public function hasFavorited($id) {
        $check = $this->favorites->where('offer_id', '=', $id)->first();

        return $check ? true : false; 
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function notificationCount()
    {
        $notifications = DB::table('notifications')->where('user_id', auth()->id())->get();
        //$count = count($notifications);
        return $this->hasMany(Notification::class);
    }
}
