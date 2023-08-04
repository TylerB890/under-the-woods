<?php

namespace App\StateMachines\Contracts;

interface PlanStateContract
{
    public function accept(): void;

    public function cancel(): void;

    public function recall(): void;

    public function reject(): void;

    public function submit(): void;
}
