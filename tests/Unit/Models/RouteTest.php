<?php

namespace tests\Unit\Models;

use App\Models\Day;
use App\Models\Location;
use App\Models\Plan;
use App\Models\Route;
use App\Models\User;

it('Belongs to a Day', function () {
    Location::factory(10)->create();
    $user = User::factory()->create();
    Plan::factory()->count(2)->create(['user_id' => $user->id]);
    $plan = Plan::all()->first();

    Day::factory()->count(2)->create(['plan_id' => $plan->id]);
    $day = Day::all()->first();
    $route = Route::factory()->create(['day_id' => $day->id]);

    expect($route->day()->count())->toBe(1);
    expect($route->day()->first())->toBeInstanceOf(Day::class);
});

it('Belongs to a Start_Location', function () {
    Location::factory(10)->create();
    $user = User::factory()->create();
    Plan::factory()->count(2)->create(['user_id' => $user->id]);
    $plan = Plan::all()->first();

    Day::factory()->count(2)->create(['plan_id' => $plan->id]);
    $day = Day::all()->first();
    $location = Location::all()->first();
    $route = Route::factory()->create(['day_id' => $day->id, 'start_location_id' => $location->id]);

    expect($route->start_location()->count())->toBe(1);
    expect($route->start_location()->first())->toBeInstanceOf(Location::class);
});

it('Belongs to a End_Location', function () {
    Location::factory(10)->create();
    $user = User::factory()->create();
    Plan::factory()->count(2)->create(['user_id' => $user->id]);
    $plan = Plan::all()->first();

    Day::factory()->count(2)->create(['plan_id' => $plan->id]);
    $day = Day::all()->first();
    $location = Location::all()->first();
    $route = Route::factory()->create(['day_id' => $day->id, 'end_location_id' => $location->id]);

    expect($route->end_location()->count())->toBe(1);
    expect($route->end_location()->first())->toBeInstanceOf(Location::class);
});
