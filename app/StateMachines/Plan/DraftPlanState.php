<?php

namespace App\StateMachines\Plan;

use App\StateMachines\BaseStates\BasePlanState;
use App\Models\Plan;

class DraftPlanState implements BasePlanState
{
    function submit() {
        $this->plan->update(['status' => Plan::State::Submitted->value]);
        # Send email to End User
    }
}