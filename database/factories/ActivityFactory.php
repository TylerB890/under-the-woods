<?php

namespace Database\Factories;

use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Day>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start_time = Carbon::now();
        $end_time = Carbon::now()->addMinutes(fake()->numberBetween(30, 240));

        return [
            'location_id' => Location::inRandomOrder()->first()->id,
            'start_time' => $start_time->format('Y-m-d h:i:s'),
            'end_time' => $end_time->format('Y-m-d h:i:s'),
        ];
    }

    public function withDay(Carbon $date): Factory
    {
        $start_time = new Carbon($date);
        $start_time = $start_time->addMinutes(fake()->numberBetween(30, 240));
        $end_time = new Carbon($start_time);
        $end_time = $end_time->addMinutes(fake()->numberBetween(30, 240));

        return $this->state([
            'start_time' => $start_time->format('Y-m-d h:i:s'),
            'end_time' => $end_time->format('Y-m-d h:i:s'),
        ]);
    }
}
