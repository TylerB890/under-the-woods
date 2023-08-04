<?php

namespace App\StateMachines\Plan;

use App\Models\Plan;
use App\StateMachines\BaseStates\BasePlanState;

class RejectedPlanState implements BasePlanState
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

    public function submit(): void
    {
        $this->plan->update(['status' => Plan::State::Submitted->value]);
        // Send email to End User
    }
}
