<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    // Table name
    protected $table = "likes";

    public function users(){
        return $this->belongsTo('App\User');
    }

    public function projects(){
        return $this->belongsTo('App\Project');
    }
}
