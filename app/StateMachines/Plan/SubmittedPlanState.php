<?php

namespace App\StateMachines\Plan;

use App\Models\Plan;
use App\StateMachines\BaseStates\BasePlanState;

class SubmittedPlanState implements BasePlanState
{
    public function accept(): void
    {
        $this->plan->update(['status' => Plan::State::Finalized->value]);
        // Send email to Trip Planner
    }

    public function cancel(): void
    {
        $this->plan->update(['status' => Plan::State::Cancelled->value]);
        // Send email to Trip Planner
    }

    public function recall(): void
    {
        $this->plan->update(['status' => Plan::State::Draft->value]);
        // Send email to End User
    }

    public function reject(): void
    {
        $this->plan->update(['status' => Plan::State::Rejected->value]);
        // Send email to Trip Planner
    }
}
