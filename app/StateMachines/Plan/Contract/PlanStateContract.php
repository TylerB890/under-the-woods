<?php

namespace App\StateMachines\Contract\Plan;

interface PlanStateContract {
    function accept();
    function cancel();
    function recall();
    function reject();
    function submit();
}