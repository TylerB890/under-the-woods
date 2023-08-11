<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relation\HasMany;

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
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dinings(): HasMany
    {
        return $this->hasMany(Dining::class, 'location_id');
    }

    /**
     * Get all of the routes that start at this Location
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function starting_route(): HasMany
    {
        return $this->hasMany(Route::class, 'start_location_id');
    }

    /**
     * Get all of the routes which end at this Location
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ending_route(): HasMany
    {
        return $this->hasMany(Route::class, 'end_location_id');
    }

    /**
     * Get all of the activities at this Location
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class, 'location_id');
    }
}
