<?php

use App\Enums\PlanState;
use App\Models\Plan;
use App\Models\User;

use Exception;

it('throws an exception', function (PlanState $state) {
    $plan = Plan::factory()->create(['status' => $state]);

    $this->withoutExceptionHandling(); # Otherwise it gets handled and put into the console.
    $response = $this->put(route('submit', $plan));

})->with([
    'Submitted Plan' => [PlanState::Submitted],
    'Finalized Plan' => [PlanState::Finalized],
    'Cancelled Plan' => [PlanState::Cancelled],
])->throws(Exception::class);

test('submitting does not change state', function (PlanState $state) {
    $plan = Plan::factory()->create(['status' => $state]);
    $response = $this->put(route('submit', $plan));

    $this->withoutExceptionHandling(); # Otherwise it gets handled and put into the console.
    $plan->refresh();

    expect($plan->status)
        ->toEqual($state);
})->with([
    'Submitted Plan' => [PlanState::Submitted],
    'Finalized Plan' => [PlanState::Finalized],
    'Cancelled Plan' => [PlanState::Cancelled],
]);

it('Submits', function (PlanState $state, PlanState $result) {
    $plan = Plan::factory()->create(['status' => $state ->value]);

    $response = $this->put(route('submit', $plan));

    $plan->refresh();

    expect($plan->status)->toBe($result);
})->with([
    'Draft Plan' => [PlanState::Draft, PlanState::Submitted],
    'Rejected Plan' => [PlanState::Rejected, PlanState::Submitted],
]);
