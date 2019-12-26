<?php

namespace App\Http\Model;

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

    public function interests(){
        /* Play around in tinker:
            $user = App\User::find(1);
            $user->interests;
        */

        return $this->belongsToMany('App\Http\Model\Interest', 'users_interests')
            ->using('App\Http\Model\UserInterest')
            ->withPivot('skill_level');
    }

    public function projects(){
        /* Play around with tinker:
            $user->projects;
            $user->projects[0];
            $user->projects[0]->pivot->permission;
         */
        return $this->belongsToMany('App\Http\Model\Project', 'users_projects')
            ->using('App\Http\Model\UserProject')
            ->withPivot('permission');
    }

    public function likes(){
        return $this->hasMany('App\Http\Model\Like');
    }
}
