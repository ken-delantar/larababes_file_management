<?php

namespace App\Livewire\Grade11;

use App\Models\DocumentRecord;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentDocuments extends Component
{
    use WithPagination;

    public $student_id, $name;
    public $student;

    public function mount(){
        $this->student = Student::find($this->student_id);
        $this->name = $this->student->name;
    }

    public function save()
    {
        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Documents saved successfully!',
        ]);
        
    }

    public function back(){
        return redirect()->route('index_grade_11', 'data');
    }

    public function render()
    {
        $documents = DocumentRecord::latest()->paginate(1);

        return view('livewire.grade11.student-documents', [
            'documents' => $documents
        ]);
    }
}
