<?php

namespace App\StateMachines\Plan;

use App\StateMachines\Plan\Contract\PlanStateContract;
use App\Models\Plan;

class RejectedPlanState implements PlanStateContract
{
    function accept() {
        $this->plan->update(['status' => Plan::State::Finalized->value]);
        # Send email to Trip Planner
    }

    function cancel() {
        $this->plan->update(['status' => Plan::State::Cancelled->value]);
        # Send email to Trip Planner
    }

    function recall() {throw new Exception();}

    function reject() {throw new Exception();}

    function submit() {
        $this->plan->update(['status' => Plan::State::Submitted->value]);
        # Send email to End User
    }
}