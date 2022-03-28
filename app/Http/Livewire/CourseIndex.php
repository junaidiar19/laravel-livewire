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

    // for filter
    public $row = 5;
    public $category;
    public $search;

    public $statusUpdate = false;

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
            'search' => $this->search,
            'category' => $this->category,
        ];

        $courses = Course::filter($params)->latest()->paginate($this->row);
        
        return view('livewire.course.index', [
            'categories' => $categories,
            'courses' => $courses
        ]);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:3',
            'categoryId' => 'required|exists:categories,id'
        ], [
            'name.required' => 'Please enter a name',
            'name.min' => 'Name must be at least 3 characters',
            'categoryId.required' => 'Please select a category',
            'categoryId.exists' => 'Please select a valid category'
        ]);

        Course::create([
            'name' => $this->name,
            'category_id' => $this->categoryId
        ]);

        session()->flash('success', 'Kursus berhasil ditambahkan.');
        $this->name = '';
        $this->categoryId = '';
    }

    public function deleteId($id)
    {
        $this->statusDelete = true;
        $course = Course::find($id);
        
        $this->emit('courseDelete', $course);
    }

    public function courseDeleted()
    {
        session()->flash('success', 'Kursus berhasil dihapus.');
    }

    public function edit($id)
    {
        $course = Course::find($id);

        $this->emit('courseEdit', $course);
        $this->statusUpdate = true;
    }
    
    public function courseUpdated()
    {
        session()->flash('success', 'Kursus berhasil diubah.');
    }
}
