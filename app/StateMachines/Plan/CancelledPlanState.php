<?php

namespace App\StateMachines\Plan;

use App\StateMachines\Plan\Contract\PlanStateContract;
use App\Models\Plan;

class CancelledPlanState implements PlanStateContract
{
    function accept() {throw new Exception();}
    function cancel() {throw new Exception();}
    function recall() {throw new Exception();} # Possible changes here in the future
    function reject() {throw new Exception();}
    function submit() {throw new Exception();}
}