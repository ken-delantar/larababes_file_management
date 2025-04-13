<?php

namespace App\Livewire\Grade11;

use Exception;
use App\Models\Student;
use Livewire\Component;
use App\Models\Document;
use App\Models\Checklist;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\AcademicRecord;
use App\Models\DocumentRecord;

class StudentDocuments extends Component
{
    use WithPagination, WithFileUploads;

    public $student_id, $name;
    public $student;
    public $docs;

    public $academic_record;

    public $file_upload;
    public $form_137, $form_138, $good_moral, $psa, $pic, $esc_certificate, $diploma, $brgy_certificate, $ncae, $af_five;

    public $checklistData = [
        'form_137' => false,
        'form_138' => false,
        'good_moral' => false,
        'psa' => false,
        'pic' => false,
        'esc_certificate' => false,
        'diploma' => false,
        'brgy_certificate' => false,
        'ncae' => false,
        'af_five' => false,
    ];

    public function mount()
    {
        $this->student = Student::find($this->student_id);
        $this->name = $this->student->name;
        $this->docs = Document::where('student_id', $this->student->id)->first();
        $this->academic_record = AcademicRecord::where('student_id', $this->student_id)->first();
        
        if ($this->docs) {
            // Fetch checklist data based on the document_id
            $checklist = Checklist::where('document_id', $this->docs->id)->first();
            
            // If checklist exists, initialize the checkbox values from the database
            if ($checklist) {
                $this->checklistData = [
                    'form_137' => $checklist->form_137 ?? false,
                    'form_138' => $checklist->form_138 ?? false,
                    'good_moral' => $checklist->good_moral ?? false,
                    'psa' => $checklist->psa ?? false,
                    'pic' => $checklist->pic ?? false,
                    'esc_certificate' => $checklist->esc_certificate ?? false,
                    'diploma' => $checklist->diploma ?? false,
                    'brgy_certificate' => $checklist->brgy_certificate ?? false,
                    'ncae' => $checklist->ncae ?? false,
                    'af_five' => $checklist->af_five ?? false,
                ];
            }
        }
    }
    
    public function checklist()
    {
        try {
            // Validate the checklist data
            $data = $this->validate([
                'checklistData.form_137' => 'nullable|boolean',
                'checklistData.form_138' => 'nullable|boolean',
                'checklistData.good_moral' => 'nullable|boolean',
                'checklistData.psa' => 'nullable|boolean',
                'checklistData.pic' => 'nullable|boolean',
                'checklistData.esc_certificate' => 'nullable|boolean',
                'checklistData.diploma' => 'nullable|boolean',
                'checklistData.brgy_certificate' => 'nullable|boolean',
                'checklistData.ncae' => 'nullable|boolean',
                'checklistData.af_five' => 'nullable|boolean',
            ]);

            // Retrieve or create the document for the student
            $document = Document::firstOrCreate([
                'student_id' => $this->student->id
            ]);

            Checklist::updateOrCreate(
                ['document_id' => $document->id],
                $data['checklistData'] 
            );

            session()->flash('message', 'Checklist saved successfully.');
        } catch (\Exception $e) {
            session()->flash('message', 'Failed to save checklist: ' . Str::limit($e->getMessage(), 200));
        }
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
                'type' => $type,
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
