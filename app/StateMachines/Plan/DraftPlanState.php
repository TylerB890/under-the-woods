<?php

namespace App\StateMachines\Plan;

use App\Enums\PlanState;
use App\StateMachines\BaseStates\BasePlanState;

class DraftPlanState extends BasePlanState
{
    public function submit(): void
    {
        $this->plan->update(['status' => PlanState::Submitted->value]);
        // Send email to End User
    }
}
