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

    public function ownedProjects(){
        return $this->hasMany('App\Project', 'owner_key');
    }

    public function interests(){
        // Play around in tinker:
        // $user = App\User::find(1);
        // $user->interests;
        // $user->interests[0]->pivot->skill_level;

        return $this->belongsToMany('App\Interest', 'users_interests')
            ->using('App\UserInterest')
            ->withPivot('skill_level');
    }
}
