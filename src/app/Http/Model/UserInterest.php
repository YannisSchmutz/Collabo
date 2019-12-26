<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserInterest extends Pivot
{
    // Table name
    protected $table = 'users_interests';
}
