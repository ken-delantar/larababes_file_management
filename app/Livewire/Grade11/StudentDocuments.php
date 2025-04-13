<?php

namespace App\Livewire\Grade11;

use App\Models\AcademicRecord;
use App\Models\Student;
use Livewire\Component;
use App\Models\Document;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\DocumentRecord;
use Exception;
use Illuminate\Support\Str;

class StudentDocuments extends Component
{
    use WithPagination, WithFileUploads;

    public $student_id, $name;
    public $student;
    public $docs;

    public $academic_record;

    public $file_upload;

    public function mount(){
        $this->student = Student::find($this->student_id);
        $this->name = $this->student->name;
        $this->docs = Document::where('student_id', $this->student->id)->first();

        $this->academic_record = AcademicRecord::where('student_id', $this->student_id)->first();
    }

    public function uploadFile()
    {
        $this->validate([
            'file_upload' => 'required|file|max:10240|mimetypes:application/pdf,image/jpeg,image/png,image/gif',
        ]);

        try {
            $file = $this->file_upload;

            $type = $file->getMimeType(); 
            $blob = file_get_contents($file->getRealPath());

            $docu = Document::firstOrCreate([
                'student_id' => $this->student->id,
            ]);

            DocumentRecord::create([
                'document_id' => $docu->id,
                '1' => $type,
                'docs' => $blob,
            ]);

            $this->reset('file_upload');
            session()->flash('message', 'File uploaded successfully.');

        } catch (\Exception $e) {
            session()->flash('message', 'Failed to upload: ' . Str::limit($e->getMessage(), 30));
        }
    }

    public function back(){
        return redirect()->route('index_grade_11', 'data');
    }

    public function student_information(){
        return redirect()->route('index_grade_11_profile', ['student_profile', $this->academic_record->id]);
    }

    public function render()
    {
        $documents = [];

        if ($this->docs){
            $documents = DocumentRecord::where('document_id', $this->docs->id)->latest()->paginate(1);
        }
        
        return view('livewire.grade11.student-documents', [
            'documents' => $documents
        ]);
    }
}
