<?php

namespace Unlu\NearestTo\Traits;

use Illuminate\Database\Eloquent\Builder;

trait NearestTo
{
    /**
     *
     * @param Builder $query
     * @param  float  $latitude
     * @param  float  $longitude
     * @return void
     */
    public function scopeNearestTo(Builder $query, float $latitude, float $longitude): void
    {
        $haversine = "(6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude))))";
        $query->orderByRaw($haversine, [$latitude, $longitude, $latitude]);
    }
}
