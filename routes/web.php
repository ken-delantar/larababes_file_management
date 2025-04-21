<?php

use App\Livewire\Form;
use App\Models\DocumentRecord;
use App\Livewire\Grade11\Checklist;
use App\Livewire\Grade11\AddStudent;
use Illuminate\Support\Facades\Route;
use App\Livewire\Grade11\ChecklistTable;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\GradeElevenController;
use App\Http\Controllers\GradeTwelveController;
use App\Livewire\Grade11\Index as Grade11Index;
use App\Models\AcademicRecord;
use App\Models\SchoolYear;
use App\Models\Section;
use App\Models\Strand;
use App\Models\Student;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $students = Student::all();
        $strands = Strand::all();
        $academic_records = AcademicRecord::all();
        $school_years = SchoolYear::all();

        return view('dashboard', compact('students', 'strands', 'academic_records', 'school_years'));
    })->name('dashboard');
    
    Route::get('/grade_11_index/{view}', [GradeElevenController::class, 'render'])->name('index_grade_11');
    Route::get('/grade_11/index/{view}/{academic_record}', [GradeElevenController::class, 'student_profile'])->name('index_grade_11_profile');
    Route::get('/grade_11_index/{view}/{student_id}', [GradeElevenController::class, 'student_documents'])->name('index_grade_11_documents');
    // Route::get('/grade11_add_student', [AddStudent::class, 'render'])->name('add_student_grade11');

    Route::get('/grade_12_index/{view}', [GradeTwelveController::class, 'render'])->name('index_grade_12');
    Route::get('/grade_12/index/{view}/{academic_record}', [GradeTwelveController::class, 'student_profile'])->name('index_grade_12_profile');
    Route::get('/grade_12_index/{view}/{student_id}', [GradeTwelveController::class, 'student_documents'])->name('index_grade_12_documents');

    Route::get('/document_checklist', function(){
        return view('checklist_table');
    })->name('document_checklist');
});


Route::get('/trial', function () {
    $documents = DocumentRecord::all();
    return view('inamoferrer', compact('documents'));
})->name('trial');

Route::get('/document/view/{id}', function ($id) {
    $document = DocumentRecord::findOrFail($id);

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mimeType = $finfo->buffer($document->docs);

    return Response::make($document->docs, 200, [
        'Content-Type' => $mimeType,
        'Content-Disposition' => 'inline; filename="document"'
    ]);
})->name('document.view');


Route::post('/upload', [GradeElevenController::class, 'upload_file'])->name('upload');

//grade 11
