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

    public function projects(){
        return $this->belongsToMany('App\Project', 'projects_interests')
            ->using('App\ProjectInterest')
            ->withPivot('skill_level');
    }
}
