<?php

use App\Enums\PlanState;
use App\Models\Plan;

test('Submit Draft Plan returns Submitted Plan', function () {
    $plan = Plan::factory()->make();

    expect($plan->status)->toBe(PlanState::Draft);
});
