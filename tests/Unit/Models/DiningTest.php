<?php

namespace tests\Unit\Models;

use App\Models\Day;
use App\Models\Dining;
use App\Models\Location;
use App\Models\User;
use App\Models\Plan;
use Carbon\Carbon;

it('Belongs to a day', function() {
    $user = User::factory()->create();
    $plan = Plan::factory()->create(['user_id' => $user->id]);
    $location = Location::factory()->create();
    $day = Day::factory()->create(['plan_id' => $plan->id]);
    $day2 = Day::factory()->create(['plan_id' => $plan->id]);
    $dining = Dining::factory()->create(['day_id' => $day->id]);

    expect($dining->day()->count())->toBe(1);
    expect($dining->day)->toBeInstanceOf(Day::class);

});

it('Belongs to a location', function() {
    $date = Carbon::createFromFormat('Y-m-d', '1990-01-01');
    $user = User::factory()->create();
    $plan = Plan::factory()->create(['user_id' => $user->id]);
    Location::factory()->count(10)->create();
    $day = Day::factory()->create(['plan_id' => $plan->id]);
    $dining = Dining::factory()->create(['day_id' => $day->id]);
    
    # using `location` creates a `select * from locations` which is not correct
    expect($dining->location()->count())->toBe(1); 
    expect($dining->location)->toBeInstanceOf(Location::class);

});
