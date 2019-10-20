<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    public function users(){
        return $this->belongsToMany('App\User', 'users_interests')
            ->using('App\UserInterest')
            ->withPivot('skill_level');
    }
}
