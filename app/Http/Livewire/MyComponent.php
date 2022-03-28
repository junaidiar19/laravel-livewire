<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MyComponent extends Component
{
    public $input;
    
    public function render()
    {
        return view('livewire.my-component');
    }
}
