<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DevelopmentMilestone extends Pivot
{
    protected $table='development_milestone';
}
