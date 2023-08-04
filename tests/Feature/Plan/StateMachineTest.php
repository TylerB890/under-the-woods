<?php

use App\Enums\PlanState;
use App\Models\Plan;
use Exception;

it('handles state as expected', function (string $method, PlanState $state, PlanState $expected) {
    $plan = Plan::factory()->create(['status' => $state]);
    $response = $this->put(route($method, $plan));

    $this->withoutExceptionHandling(); // Otherwise it gets handled and put into the console.
    $plan->refresh();

    expect($plan->status)->toBe($expected);
})->with([
    'Submit Draft Plan' => ['submit', PlanState::Draft,     PlanState::Submitted],
    'Submit Rejected Plan' => ['submit', PlanState::Rejected,  PlanState::Submitted],
    'Submit Submitted Plan' => ['submit', PlanState::Submitted, PlanState::Submitted],
    'Submit Finalized Plan' => ['submit', PlanState::Finalized, PlanState::Finalized],
    'Submit Cancelled Plan' => ['submit', PlanState::Cancelled, PlanState::Cancelled],
    'Cancel Draft Plan' => ['cancel', PlanState::Draft,     PlanState::Draft],
    'Cancel Rejected Plan' => ['cancel', PlanState::Rejected,  PlanState::Cancelled],
    'Cancel Submitted Plan' => ['cancel', PlanState::Submitted, PlanState::Cancelled],
    'Cancel Finalized Plan' => ['cancel', PlanState::Finalized, PlanState::Finalized],
    'Cancel Cancelled Plan' => ['cancel', PlanState::Cancelled, PlanState::Cancelled],
    'Recall Draft Plan' => ['recall', PlanState::Draft,     PlanState::Draft],
    'Recall Rejected Plan' => ['recall', PlanState::Rejected,  PlanState::Rejected],
    'Recall Submitted Plan' => ['recall', PlanState::Submitted, PlanState::Draft],
    'Recall Finalized Plan' => ['recall', PlanState::Finalized, PlanState::Finalized],
    'Recall Cancelled Plan' => ['recall', PlanState::Cancelled, PlanState::Draft],
    'Reject Draft Plan' => ['reject', PlanState::Draft,     PlanState::Draft],
    'Reject Rejected Plan' => ['reject', PlanState::Rejected,  PlanState::Rejected],
    'Reject Submitted Plan' => ['reject', PlanState::Submitted, PlanState::Rejected],
    'Reject Finalized Plan' => ['reject', PlanState::Finalized, PlanState::Finalized],
    'Reject Cancelled Plan' => ['reject', PlanState::Cancelled, PlanState::Cancelled],
    'Accept Draft Plan' => ['accept', PlanState::Draft,     PlanState::Draft],
    'Accept Rejected Plan' => ['accept', PlanState::Rejected,  PlanState::Finalized],
    'Accept Submitted Plan' => ['accept', PlanState::Submitted, PlanState::Finalized],
    'Accept Finalized Plan' => ['accept', PlanState::Finalized, PlanState::Finalized],
    'Accept Cancelled Plan' => ['accept', PlanState::Cancelled, PlanState::Cancelled],
]);

it('throws an exception', function (string $method, PlanState $state) {
    $plan = Plan::factory()->make(['status' => $state]);

    $this->withoutExceptionHandling(); // Otherwise it gets handled and put into the console.
    $response = $this->put(route($method, $plan));

})->with([
    'Submit Submitted Plan' => ['submit', PlanState::Submitted],
    'Submit Finalized Plan' => ['submit', PlanState::Finalized],
    'Submit Cancelled Plan' => ['submit', PlanState::Cancelled],
    'Cancel Finalized Plan' => ['cancel', PlanState::Finalized],
    'Cancel Cancelled Plan' => ['cancel', PlanState::Cancelled],
    'Recall Draft Plan' => ['recall', PlanState::Draft],
    'Recall Rejected Plan' => ['recall', PlanState::Rejected],
    'Reject Draft Plan' => ['reject', PlanState::Draft],
    'Reject Rejected Plan' => ['reject', PlanState::Rejected],
    'Reject Finalized Plan' => ['reject', PlanState::Finalized],
    'Reject Cancelled Plan' => ['reject', PlanState::Cancelled],
    'Accept Draft Plan' => ['accept', PlanState::Draft],
    'Accept Finalized Plan' => ['accept', PlanState::Finalized],
    'Accept Cancelled Plan' => ['accept', PlanState::Cancelled],
])->throws(Exception::class);
