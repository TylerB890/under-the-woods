<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    /**
     * Indicates if the model should be timestamped
     */
    public $timestamps = false;

    protected function startTime(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => new Carbon($value),
        );
    }

    protected function endTime(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => new Carbon($value),
        );
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'day_id',
        'start_location_id',
        'end_location_id',
        'start_time',
        'end_time',
    ];
}
