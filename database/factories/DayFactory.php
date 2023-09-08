<?php

namespace Database\Factories;

use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Day>
 */
class DayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $day = Carbon::now();

        return [
            'date' => $day->format('Y-m-d h:i:s'),
            'start_location_id' => Location::inRandomOrder()->first()->id,
            'end_location_id' => Location::inRandomOrder()->first()->id,
        ];
    }
}
