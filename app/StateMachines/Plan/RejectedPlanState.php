<?php

namespace App\StateMachines\Plan;

use App\StateMachines\BaseStates\BasePlanState;
use App\Models\Plan;

class RejectedPlanState implements BasePlanState
{
    function accept() {
        $this->plan->update(['status' => Plan::State::Finalized->value]);
        # Send email to Trip Planner
    }

    function cancel() {
        $this->plan->update(['status' => Plan::State::Cancelled->value]);
        # Send email to Trip Planner
    }

    function submit() {
        $this->plan->update(['status' => Plan::State::Submitted->value]);
        # Send email to End User
    }
}