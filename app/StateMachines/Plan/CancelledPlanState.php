<?php

namespace App\StateMachines\Plan;

use App\Enums\PlanState;
use App\StateMachines\BaseStates\BasePlanState;

class CancelledPlanState extends BasePlanState
{
    public function recall(): void
    {
        $this->plan->update(['status' => PlanState::Draft->value]);
    }
}
