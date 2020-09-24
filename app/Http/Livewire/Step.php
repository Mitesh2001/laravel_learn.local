<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Step extends Component
{
    public $steps = [];

    public function increment()
    {
        $this->steps++;
    }

    public function remove()
    {
        $this->steps--;
    }

    public function render()
    {
        return view('livewire.step');
    }
}
