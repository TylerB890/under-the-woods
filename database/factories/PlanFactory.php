<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\Day;
use App\Models\Dining;
use App\Models\Plan;
use App\Models\Route;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
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
        $start_date = fake()->datetimeThisYear()->format('Y-m-d H:i:s');

        return [
            'status' => 'Draft',
            'origin' => fake()->word(),
            'destination' => fake()->word(),
            'start_date' => $start_date,
            'end_date' => Carbon::createFromFormat('Y-m-d H:i:s', $start_date)->addDays(fake()->numberBetween(2, 10)),
            'submitted_at' => null,
            'rejected_at' => null,
            'cancelled_at' => null,
        ];
    }

    public function submitted(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'Submitted',
            ];
        })->afterCreating(function (Plan $plan) {
            $period = CarbonPeriod::create($plan->start_date, $plan->end_date);
            foreach ($period as $date) {
                Day::factory()
                    ->state(['plan_id' => $plan->id, 'date' => $date])
                    ->has(Route::factory()->withDay($date))
                    ->has(Route::factory()->withDay($date))
                    ->has(Activity::factory()->withDay($date))
                    ->has(Activity::factory()->withDay($date))
                    ->has(Dining::factory()->withDay($date))
                    ->has(Dining::factory()->withDay($date))
                    ->create();
            }

        });
    }
}
