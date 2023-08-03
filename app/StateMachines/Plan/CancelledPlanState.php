<?php

namespace App\StateMachines\Plan;

use App\StateMachines\BaseStates\BasePlanState;
use App\Models\Plan;

class CancelledPlanState implements BasePlanState
{
    function recall() {throw new Exception();} # Possible changes here in the future
}