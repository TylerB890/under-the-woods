<?php

namespace App\Livewire;


use Livewire\Component;
use Illuminate\View\View;

class Counter extends Component
{
    public int $count = 1;
    
    public function increment(): void
    {
        $this->count++;
    }

    public function decrement(): void
    {
        $this->count--;
    }

    public function render(): View
    {
        return view('livewire.counter');
    }
}
