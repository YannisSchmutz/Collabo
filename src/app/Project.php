<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function owned_by(){
        return $this->belongsTo('App\User', 'id', 'owner_key');
    }
}
