<?php

namespace App\StateMachines\Plan;

use App\StateMachines\Plan\Contract\PlanStateContract;
use App\Models\Plan;

class DraftPlanState implements PlanStateContract
{
    function accept() {throw new Exception();}
    function cancel() {throw new Exception();}
    function recall() {throw new Exception();}
    function reject() {throw new Exception();}
    function submit() {
        $this->plan->update(['status' => Plan::State::Submitted->value]);
        # Send email to End User
    }
}