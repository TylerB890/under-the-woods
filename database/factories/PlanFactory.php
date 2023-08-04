<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create()->id,
            'status' => 'Draft',
            'origin' => fake()->text(),
            'destination' => fake()->text(),
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(10),
            'submitted_at' => null,
            'rejected_at' => null,
            'cancelled_at' => null,
        ];
    }
}
