<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function interests() {
        /* Play around in tinker:
            $project = App\Project::find(1);
            $project->interests;
        */
        return $this->belongsToMany('App\Interest', 'projects_interests')
            ->using('App\ProjectInterest');
    }

    public function users(){
        return $this->belongsToMany('App\User', 'users_projects')
            ->using('App\UserProject')
            ->withPivot('permission');
    }
}
