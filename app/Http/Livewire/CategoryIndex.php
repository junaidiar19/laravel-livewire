<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategoryIndex extends Component
{
    public function render()
    {
        return view('livewire.category-index')->extends('layouts.app');
    }
}
