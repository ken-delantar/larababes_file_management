<?php

use App\Livewire\Form;
use App\Livewire\Grade11\AddStudent;
use App\Livewire\Grade11\Checklist;
use App\Livewire\Grade11\ChecklistTable;
use App\Livewire\Grade11\Index as Grade11Index;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//grade 11
Route::get('/grade_11_index', [Grade11Index::class, 'render'])->name('index_grade_11');
Route::get('/grade11_add_student', [AddStudent::class, 'render'])->name('add_student_grade11');
Route::get('/grade_11_checklist', [Checklist::class, 'render'])->name('checklist_grade_11');


Route::get('/inamo', function () {
    return view('inamoken');
});