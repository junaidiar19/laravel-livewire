<?php

use App\Http\Livewire\CategoryIndex;
use App\Http\Livewire\CourseDetail;
use App\Http\Livewire\CourseIndex;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', CourseIndex::class)->name('index');
Route::get('/course/{id}', CourseDetail::class)->name('course.detail');

Route::get('/category', CategoryIndex::class)->name('category');