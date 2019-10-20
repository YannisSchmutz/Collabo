<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserInterest extends Pivot
{
    // Table name
    protected $table = "users_interests";
}
