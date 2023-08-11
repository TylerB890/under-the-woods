<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Route extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped
     */
    public $timestamps = false;

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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_time' => 'timestamp',
        'end_time' => 'timestamp',
    ];

    /**
     * Get the Day that this Route belongs to
     */
    public function day(): BelongsTo
    {
        return $this->belongsTo(Day::class);
    }

    /**
     * Get the Location that this route starts at
     */
    public function start_location(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'start_location_id');
    }

    /**
     * Get the Location that this route ends at
     */
    public function end_location(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'end_location_id');
    }
}
