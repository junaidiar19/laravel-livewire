<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use App\Models\Category;

class CourseEdit extends Component
{
    public $courseId;
    public $name;
    public $categoryId;
    public $statusModal = false;

    protected $listeners = [
        'showCourse' => 'showCourse'
    ];

    public function render()
    {
        $categories = Category::all();
        
        return view('livewire.course.edit', compact('categories'));
    }

    public function showCourse($course)
    {
        $this->courseId = $course['id'];
        $this->name = $course['name'];
        $this->categoryId = $course['category_id'];
        $this->statusModal = true;
    }

    public function close()
    {
        $this->statusModal = false;
    }

    public function update()
    {
        // validation
        $this->validate([
            'name' => 'required|min:3',
            'categoryId' => 'required|exists:categories,id'
        ], [
            'name.required' => 'Please enter a name',
            'name.min' => 'Name must be at least 3 characters',
            'categoryId.required' => 'Please select a category',
            'categoryId.exists' => 'Please select a valid category'
        ]);

        // save
        $course = Course::find($this->courseId);
        $course->update([
            'name' => $this->name,
            'category_id' => $this->categoryId
        ]);

        $this->name = '';
        $this->categoryId = '';
        
        $this->emit('courseUpdated');
    }
}
