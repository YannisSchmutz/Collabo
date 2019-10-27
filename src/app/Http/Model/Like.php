<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    // Table name
    protected $table = 'likes';

    public function users(){
        return $this->belongsTo('AppHttp\Model\\User');
    }

    public function projects(){
        return $this->belongsTo('App\Http\Model\Project');
    }
}
