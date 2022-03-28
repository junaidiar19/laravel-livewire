<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseDelete extends Component
{

    public $courseId;
    public $name;

    // listener from course index
    protected $listeners = [
        'courseDelete' => 'showCourse',
    ];

    public function render()
    {
        return view('livewire.course.delete');
    }

    public function showCourse($course)
    {
        $this->courseId = $course['id'];
        $this->name = $course['name'];
    }

    public function delete()
    {
        $course = Course::find($this->courseId);
        $course->delete();

        $this->emit('courseDeleted');
    }
}