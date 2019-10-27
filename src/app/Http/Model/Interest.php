<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    public function users(){
        return $this->belongsToMany('App\Http\Model\User', 'users_interests')
            ->using('App\Http\Model\UserInterest')
            ->withPivot('skill_level');
    }

    public function projects(){
        return $this->belongsToMany('App\Http\Model\Project', 'projects_interests')
            ->using('App\Http\Model\ProjectInterest')
            ->withPivot('skill_level');
    }
}
