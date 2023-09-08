<?php

namespace tests\Unit\Models;

use App\Models\Day;
use App\Models\Location;
use App\Models\Plan;
use App\Models\User;

it('Belongs to a user', function () {
    User::factory()->count(2)->create();
    $user = User::all()->first();
    $plan = Plan::factory()->create(['user_id' => $user->id]);

    expect($plan->user()->count())->toBe(1);
    expect($plan->user)->toBeInstanceOf(User::class);
});

it('Has many days', function () {
    Location::factory()->create();

    $user = User::factory()->create();
    $plan = Plan::factory()->create(['user_id' => $user->id]);
    $extraPlan = Plan::factory()->create(['user_id' => $user->id]);

    $day1 = Day::factory()->count(2)->create(['plan_id' => $plan->id]);
    $day2 = Day::factory()->create(['plan_id' => $extraPlan->id]);

    expect($plan->days()->count())->toBe(2);
    expect($plan->days()->first())->toBeInstanceOf(Day::class);
});
