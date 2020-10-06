<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'balance',
        'avatar',
        'firstname', 
        'lastname', 
        'address',
        'city',
        'country',
        'postcode',
        'aboutme',
        'email', 
        'password', 
        'verified', 
        'token',
        'affiliate_id',
        'referred_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'token', 'remember_token'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->token = str_random(30);
        });
    } 
    public function confirmEmail()
    {
        $this->verified = true;
        $this->token = null;
        $this->save();
    }
}
