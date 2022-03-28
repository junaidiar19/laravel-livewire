<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class CourseIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $name;
    public $categoryId;

    // filter 
    public $row = 5;
    public $category;
    public $search;

    protected $queryString = [
        'row' => ['except' => 5],
        'search' => ['except' => ''],
        'category' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    protected $listeners = [
        'courseDeleted' => 'courseDeleted',
        'courseUpdated' => 'courseUpdated'
    ];

    public function render()
    {
        $categories = Category::all();

        $params = [
            'category' => $this->category,
            'search' => $this->search,
        ];

        $courses = Course::with('category')->filter($params)->latest()->paginate($this->row);

        return view('livewire.course.index', compact('categories', 'courses'))->extends('layouts.app');
    }

    public function store() 
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
        Course::create([
            'name' => $this->name,
            'category_id' => $this->categoryId
        ]);

        $this->name = '';
        $this->categoryId = '';

        // session flash
        session()->flash('success', 'Kursus berhasil ditambahkan');
    }

    public function showCourse($id)
    {
        $course = Course::find($id);

        $this->emit('showCourse', $course);
    }

    public function courseDeleted()
    {
        session()->flash('success', 'Kursus berhasil dihapus');
    }

    public function courseUpdated()
    {
        session()->flash('success', 'Kursus berhasil diubah');
    }
}
