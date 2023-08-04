<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'activities';

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
        'location_id',
        'start_time',
        'end_time',
    ];
}
