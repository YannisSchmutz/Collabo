<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function ownedBy(){
        return $this->belongsTo('App\User', 'owner_id', 'id');
    }

    public function interests() {
        /* Play around in tinker:
            $project = App\Project::find(1);
            $project->interests;
        */
        return $this->belongsToMany('App\Interest', 'projects_interests')
            ->using('App\ProjectInterest');
            //->withPivot('skill_level');
    }
}
