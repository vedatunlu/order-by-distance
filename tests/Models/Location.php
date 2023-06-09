<?php

namespace Unlu\NearestTo\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Unlu\NearestTo\Traits\NearestTo;

class Location extends Model
{
    use NearestTo;

    protected $guarded = [];
}
