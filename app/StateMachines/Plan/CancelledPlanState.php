<?php

namespace App\StateMachines\Plan;

use App\StateMachines\BaseStates\BasePlanState;

class CancelledPlanState implements BasePlanState
{
    public function recall(): void
    {
        throw new Exception();
    } // Possible changes here in the future
}
