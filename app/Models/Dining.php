<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

enum Meal: string
{
    case Breakfast = 'Breakfast';
    case Brunch = 'Brunch';
    case Lunch = 'Lunch';
    case Dinner = 'Dinner';
    case Dessert = 'Dessert';
    case Snack = 'Snack';
}

class Dining extends Model
{
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
        'location_id',
        'meal',
        'start_time',
        'end_time',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'meal' => Meal::class,
        'start_time' => 'timestamp',
        'end_time' => 'timestamp',
    ];
}
