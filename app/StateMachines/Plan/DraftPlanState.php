<?php

namespace App\StateMachines\Plan;

use App\Models\Plan;
use App\StateMachines\BaseStates\BasePlanState;

class DraftPlanState implements BasePlanState
{
    public function submit(): void
    {
        $this->plan->update(['status' => Plan::State::Submitted->value]);
        // Send email to End User
    }
}
