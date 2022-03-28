<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MyComponent extends Component
{
    public $counter = 1;
    public $input;

    public function render()
    {
        return view('livewire.my-component');
    }

    public function increment()
    {
        $this->counter++;
    }
}
