<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password', 'last_name', 'selfie',
        'phone', 'description', 'specialy', 'location',
        'gender', 'status'
    ];
    public static function checkUsers()
    {
        $user = Self::all();
        if (count($user) < 1) {
            $user = new User();
            $user->id = 1;
            $user->name = 'admin';
            $user->last_name = 'admin';
            $user->email = 'admin@gmail.com';
            $user->password = bcrypt(12341234);
            $user->status = 'admin';
            $user->save();
            // add company
            $user = new User();
            $user->id = 2;
            $user->name = 'Samer';
            $user->email = 'Samer@gmail.com';
            $user->selfie = 'images/202306271301cat-07.jpg';
            $user->password = bcrypt(12341234);
            $user->status = 'company';
            $user->save();
        }
        return Self::first();
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
