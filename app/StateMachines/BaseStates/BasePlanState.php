<?php

namespace App\StateMachines\BaseStates;

use App\Models\Plan;
use App\StateMachines\Contracts\PlanStateContract;
use Exception;

class BasePlanState implements PlanStateContract
{
    public function __construct(public Plan $plan)
    {
    }

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
