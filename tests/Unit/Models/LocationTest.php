<?php

namespace tests\Unit\Models;

use App\Models\Activity;
use App\Models\Day;
use App\Models\Dining;
use App\Models\Location;
use App\Models\Plan;
use App\Models\Route;
use App\Models\User;

it('Has many dinings', function () {
    $user = User::factory()->create();
    $plan = Plan::factory()->create(['user_id' => $user->id]);
    $location = Location::factory()->create();
    $day = Day::factory()->create(['plan_id' => $plan->id]);
    $dining = Dining::factory()->create(['day_id' => $day->id, 'location_id' => $location->id]);
    $extraDining = Dining::factory()->create(['day_id' => $day->id, 'location_id' => $location->id]);

    expect($location->dinings()->count())->toBe(2);
    expect($location->dinings()->first())->toBeInstanceOf(Dining::class);

});

it('Has many starting_routes', function () {
    Location::factory()->count(10)->create();
    $user = User::factory()->create();
    $plan = Plan::factory()->submitted()->create(['user_id' => $user->id]);
    $day = Day::factory()->create(['plan_id' => $plan->id]);
    $extraDay = Day::factory()->create(['plan_id' => $plan->id]);
    $location = Location::factory()->create();
    Route::factory()->create(['day_id' => $day->id, 'start_location_id' => $location->id]);
    Route::factory()->create(['day_id' => $extraDay->id, 'start_location_id' => $location->id]);

    expect($location->starting_route()->count())->toBe(2);
    expect($location->starting_route()->first())->toBeInstanceOf(Route::class);

});

it('Has many ending_routes', function () {
    Location::factory()->count(10)->create();
    $user = User::factory()->create();
    $plan = Plan::factory()->submitted()->create(['user_id' => $user->id]);
    $day = Day::factory()->create(['plan_id' => $plan->id]);
    $extraDay = Day::factory()->create(['plan_id' => $plan->id]);
    $location = Location::factory()->create();
    Route::factory()->create(['day_id' => $day->id, 'end_location_id' => $location->id]);
    Route::factory()->create(['day_id' => $extraDay->id, 'end_location_id' => $location->id]);

    expect($location->ending_route()->count())->toBe(2);
    expect($location->ending_route()->first())->toBeInstanceOf(Route::class);

});

it('Has many activities', function () {
    Location::factory()->count(10)->create();
    $user = User::factory()->create();
    $plan = Plan::factory()->submitted()->create(['user_id' => $user->id]);
    $day = Day::factory()->create(['plan_id' => $plan->id]);
    $extraDay = Day::factory()->create(['plan_id' => $plan->id]);
    $location = Location::factory()->create();
    Activity::factory()->create(['day_id' => $day->id, 'location_id' => $location->id]);
    Activity::factory()->create(['day_id' => $extraDay->id, 'location_id' => $location->id]);

    expect($location->activities()->count())->toBe(2);
    expect($location->activities()->first())->toBeInstanceOf(Activity::class);

});
