<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function linkedin()
    {
        if($this->profile->linkedin == null || $this->profile->linkedin == ""){
            return "#";
        }
        return $this->profile->linkedin;
    }

    public function bio()
    {
        if($this->profile->bio == null || $this->profile->bio == ""){
            return "An author for the Emarss Technologies new and updates team.";
        }
        return $this->profile->bio;
    }

    public function facebook()
    {
        if($this->profile->facebook == null || $this->profile->facebook == ""){
            return "#";
        }
        return $this->profile->facebook;
    }

    public function twitter()
    {
        if($this->profile->twitter == null || $this->profile->twitter == ""){
            return "#";
        }
        return $this->profile->twitter;
    }

}
