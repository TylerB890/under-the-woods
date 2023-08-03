<?php

namespace App\StateMachines\BaseStates;

use App\Models\Plan;
use App\StateMachines\Contracts\PlanStateContract;

class BaseInvoiceState implements PlanStateContract
{
    function __construct(public Plan $plan) {}

    function accept() {throw new Exception();}
    function cancel() {throw new Exception();}
    function recall() {throw new Exception();}
    function reject() {throw new Exception();}
    function submit() {throw new Exception();}
}