<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function interests() {
        /* Play around in tinker:
            $project = App\Project::find(1);
            $project->interests;
        */
        return $this->belongsToMany('App\Http\Model\Interest', 'projects_interests')
            ->using('App\ProjectInterest');
    }

    public function users(){
        return $this->belongsToMany('App\Http\Model\User', 'users_projects')
            ->using('App\Http\Model\UserProject')
            ->withPivot('permission');
    }

    public function likes() {
        return $this->hasMany('App\Http\Model\Like');
    }
}
