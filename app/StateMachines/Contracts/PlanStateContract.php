<?php

namespace App\StateMachines\Contracts\Plan;

interface PlanStateContract {
    function accept();
    function cancel();
    function recall();
    function reject();
    function submit();
}