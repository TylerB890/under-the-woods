<?php
 
namespace App\Livewire;
 
use Livewire\Component;
use App\Models\Plan;
 
class PlanEntry extends Component
{

    public function render()
    {
        return view('livewire.plan-entry', [
            'plan' => Plan::all()->first(),
        ]);
    }
}