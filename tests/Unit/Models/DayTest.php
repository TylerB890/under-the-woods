<?php

namespace tests\Unit\Models;

use App\Models\Activity;
use App\Models\Day;
use App\Models\Dining;
use App\Models\Location;
use App\Models\Plan;
use App\Models\Route;
use App\Models\User;

it('Belongs to a Plan', function () {
    Location::factory(10)->create();
    $user = User::factory()->create();
    Plan::factory()->count(2)->create(['user_id' => $user->id]);
    $plan = Plan::all()->first();

    $day = Day::factory()->create(['plan_id' => $plan->id]);

    expect($day->plan()->count())->toBe(1);
    expect($day->plan()->first())->toBeInstanceOf(Plan::class);

});

it('Has many Activities', function () {
    Location::factory(10)->create();
    $user = User::factory()->create();
    Plan::factory()->count(2)->create(['user_id' => $user->id]);
    $plan = Plan::all()->first();

    $day = Day::factory()->create(['plan_id' => $plan->id]);
    $day2 = Day::factory()->create(['plan_id' => $plan->id]);
    Activity::factory()->count(5)->create(['day_id' => $day->id]);
    Activity::factory()->count(1)->create(['day_id' => $day2->id]);

    expect($day->activities()->count())->toBe(5);
    expect($day->activities()->first())->toBeInstanceOf(Activity::class);

});

it('Has many Dinings', function () {
    Location::factory(10)->create();
    $user = User::factory()->create();
    Plan::factory()->count(2)->create(['user_id' => $user->id]);
    $plan = Plan::all()->first();

    $day = Day::factory()->create(['plan_id' => $plan->id]);
    $day2 = Day::factory()->create(['plan_id' => $plan->id]);
    Dining::factory()->count(3)->create(['day_id' => $day->id]);
    Dining::factory()->count(2)->create(['day_id' => $day2->id]);

    expect($day->dinings()->count())->toBe(3);
    expect($day->dinings()->first())->toBeInstanceOf(Dining::class);

});

it('Has many Routes', function () {
    Location::factory(10)->create();
    $user = User::factory()->create();
    Plan::factory()->count(2)->create(['user_id' => $user->id]);
    $plan = Plan::all()->first();

    $day = Day::factory()->create(['plan_id' => $plan->id]);
    $day2 = Day::factory()->create(['plan_id' => $plan->id]);
    Route::factory()->count(2)->create(['day_id' => $day->id]);
    Route::factory()->count(3)->create(['day_id' => $day2->id]);

    expect($day->routes()->count())->toBe(2);
    expect($day->routes()->first())->toBeInstanceOf(Route::class);

});
