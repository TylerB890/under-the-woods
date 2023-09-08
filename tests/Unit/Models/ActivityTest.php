<?php

namespace tests\Unit\Models;

use App\Models\Activity;
use App\Models\Day;
use App\Models\Location;
use App\Models\Plan;
use App\Models\User;

it('Belongs to a Day', function () {
    Location::factory()->count(10)->create();

    $user = User::factory()->create();
    $plan = Plan::factory()->create(['user_id' => $user->id]);
    Day::factory()->count(3)->create(['plan_id' => $plan->id]);
    $day = Day::all()->first();
    $activity = Activity::factory()->create(['day_id' => $day->id]);

    expect($activity->day()->count())->toBe(1);
    expect($activity->day()->first())->toBeInstanceOf(Day::class);

});

it('Belongs to a Location', function () {
    Location::factory()->count(10)->create();

    $user = User::factory()->create();
    $plan = Plan::factory()->create(['user_id' => $user->id]);
    Day::factory()->count(3)->create(['plan_id' => $plan->id]);
    $day = Day::all()->first();
    $location = Location::all()->first();
    $activity = Activity::factory()->create(['day_id' => $day->id, 'location_id' => $location->id]);

    expect($activity->location()->count())->toBe(1);
    expect($activity->location()->first())->toBeInstanceOf(Location::class);

});
