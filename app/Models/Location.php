<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
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
        'name',
        'lat',
        'long',
    ];

    /**
     * Get all of the dinings for the Location
     */
    public function dinings(): HasMany
    {
        return $this->hasMany(Dining::class);
    }

    /**
     * Get all of the routes that start at this Location
     */
    public function starting_route(): HasMany
    {
        return $this->hasMany(Route::class, 'start_location_id');
    }

    /**
     * Get all of the routes which end at this Location
     */
    public function ending_route(): HasMany
    {
        return $this->hasMany(Route::class, 'end_location_id');
    }

    /**
     * Get all of the activities at this Location
     */
    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class, 'location_id');
    }
}
