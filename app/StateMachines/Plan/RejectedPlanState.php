<?php

namespace App\StateMachines\Plan;

use App\Models\Plan;
use App\Enums\PlanState;
use App\StateMachines\BaseStates\BasePlanState;

class RejectedPlanState extends BasePlanState
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

    public function submit(): void
    {
        $this->plan->update(['status' => PlanState::Submitted->value]);
        // Send email to End User
    }
}
