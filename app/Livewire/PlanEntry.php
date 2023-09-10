<?php

namespace App\Livewire;

use App\Models\Plan;
use Livewire\Component;

class PlanEntry extends Component
{
    public function render(): View
    {
        return view('livewire.plan-entry', [
            'plan' => Plan::all()->first(),
        ]);
    }
}
