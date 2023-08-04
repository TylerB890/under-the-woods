<?php

namespace App\StateMachines\Plan;

use App\Enums\PlanState;
use App\StateMachines\BaseStates\BasePlanState;

class SubmittedPlanState extends BasePlanState
{
    public function accept(): void
    {
        $this->plan->update(['status' => PlanState::Finalized->value]);
        // Send email to Trip Planner
    }

    public function cancel(): void
    {
        $this->plan->update(['status' => PlanState::Cancelled->value]);
        // Send email to Trip Planner
    }

    public function recall(): void
    {
        $this->plan->update(['status' => PlanState::Draft->value]);
        // Send email to End User
    }

    public function reject(): void
    {
        $this->plan->update(['status' => PlanState::Rejected->value]);
        // Send email to Trip Planner
    }
}
