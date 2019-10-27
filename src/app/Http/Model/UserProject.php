<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserProject extends Pivot
{
    // Table name
    protected $table = "users_projects";
}
