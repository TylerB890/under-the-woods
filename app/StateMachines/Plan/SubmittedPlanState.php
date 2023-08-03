<?php

namespace App\StateMachines\Plan;

use App\StateMachines\BaseStates\BasePlanState;
use App\Models\Plan;

class SubmittedPlanState implements BasePlanState
{
    function accept() {
        $this->plan->update(['status' => Plan::State::Finalized->value]);
        # Send email to Trip Planner
    }

    function cancel() {
        $this->plan->update(['status' => Plan::State::Cancelled->value]);
        # Send email to Trip Planner
    }

    function recall() {
        $this->plan->update(['status' => Plan::State::Draft->value]);
        # Send email to End User
    }

    function reject() {
        $this->plan->update(['status' => Plan::State::Rejected->value]);
        # Send email to Trip Planner
    }
}