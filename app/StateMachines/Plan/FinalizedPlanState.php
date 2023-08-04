<?php

namespace App\StateMachines\Plan;

use App\StateMachines\BaseStates\BasePlanState;

class FinalizedPlanState implements BasePlanState
{
    public function accept(): void
    {
        throw new Exception();
    }

    public function cancel(): void
    {
        throw new Exception();
    }

    public function recall(): void
    {
        throw new Exception();
    }

    public function reject(): void
    {
        throw new Exception();
    }

    public function submit(): void
    {
        throw new Exception();
    }
}
