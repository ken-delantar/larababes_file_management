<?php

use App\Livewire\Form;
use App\Models\DocumentRecord;
use App\Livewire\Grade11\Checklist;
use App\Livewire\Grade11\AddStudent;
use Illuminate\Support\Facades\Route;
use App\Livewire\Grade11\ChecklistTable;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\GradeElevenController;
use App\Livewire\Grade11\Index as Grade11Index;

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
    
    Route::get('/grade_11_index/{view}', [GradeElevenController::class, 'render'])->name('index_grade_11');
    Route::get('/grade_11/index/{view}/{academic_record}', [GradeElevenController::class, 'student_profile'])->name('index_grade_11_profile');

    Route::get('/grade11_add_student', [AddStudent::class, 'render'])->name('add_student_grade11');
    Route::get('/grade_11_checklist', [Checklist::class, 'render'])->name('checklist_grade_11');
});


Route::get('/trial', function () {
    $documents = DocumentRecord::all();
    return view('inamoferrer', compact('documents'));
})->name('trial');

Route::get('/document/view/{id}', function ($id) {
    $document = DocumentRecord::findOrFail($id);

    // Detect MIME type dynamically
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mimeType = $finfo->buffer($document->docs);

    return Response::make($document->docs, 200, [
        'Content-Type' => $mimeType,
        'Content-Disposition' => 'inline; filename="document"'
    ]);
})->name('document.view');


Route::post('/upload', [GradeElevenController::class, 'upload_file'])->name('upload');

//grade 11
