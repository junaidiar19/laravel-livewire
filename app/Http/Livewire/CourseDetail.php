<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseDetail extends Component
{
    public $course;

    public function render()
    {
        return view('livewire.course.detail')->extends('layouts.app');
    }

    public function mount($id)
    {
        $this->course = Course::find($id);
    }
}
