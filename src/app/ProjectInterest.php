<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectInterest extends Pivot
{
    // Table name
    protected $table = "projects_interests";
}
