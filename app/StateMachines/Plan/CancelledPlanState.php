<?php

namespace App\StateMachines\Plan;

use App\StateMachines\BaseStates\BasePlanState;
use Exception;

class CancelledPlanState extends BasePlanState
{
    public function recall(): void
    {
        throw new Exception();
    } // Possible changes here in the future
}
