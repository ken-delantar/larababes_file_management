<?php

namespace App\Livewire\Grade12;

use App\Livewire\DocumentChecklist;
use Exception;
use App\Models\Student;
use Livewire\Component;
use App\Models\Document;
use App\Models\Checklist;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\AcademicRecord;
use App\Models\DocumentFile;
use App\Models\DocumentRecord;

class StudentDocuments extends Component
{   
    use WithPagination, WithFileUploads;

    public $viewDocumentModal = false;
    public $file_id, $field;
    public $fileMimeType;

    public $student_id, $name;
    public $student;
    public $docs;

    public $academic_record;

    public $file_uploads = [];
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
            $checklist = Checklist::where('document_id', $this->docs->id)->first();
            
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

    public function viewDocument($file_id, $field)
    {
        $this->file_id = $file_id;
        $this->field = $field;
    
        $doc = DocumentFile::find($file_id);
        $fileData = $doc?->{$field};
    
        if ($fileData) {
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $this->fileMimeType = $finfo->buffer($fileData);
        } else {
            $this->fileMimeType = null;
        }
    
        $this->viewDocumentModal = true;
    }
    
    public function checklist()
    {
        try {
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

            $document = Document::firstOrCreate([
                'student_id' => $this->student->id
            ]);

            Checklist::updateOrCreate(
                ['document_id' => $document->id],
                $data['checklistData'] 
            );

            session()->flash('message', 'Checklist saved successfully.');
            $this->dispatch('checklistUpdated');
        } catch (\Exception $e) {
            session()->flash('message', 'Failed to save: ' . Str::limit($e->getMessage(), 300));
        }
    }

    public function uploadFile()
    {
        $this->validate([
            'file_uploads.*' => 'required|file|max:10240|mimetypes:application/pdf,image/jpeg,image/png,image/gif',
        ]);

        $allowedFilenames = [
            'form_137', 'form_138', 'good_moral', 'psa', 'pic',
            'esc_certificate', 'diploma', 'brgy_certificate', 'ncae', 'af_five'
        ];

        try {
            $docu = Document::firstOrCreate([
                'student_id' => $this->student->id,
            ]);

            $docFile = DocumentFile::firstOrCreate(['document_id' => $docu->id]);

            foreach ($this->file_uploads as $file) {
                $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $sluggedFilename = Str::slug($filename, '_');

                if (!in_array($sluggedFilename, $allowedFilenames)) {
                    session()->flash('message', "Invalid file name: $filename");
                    break;
                }

                $blob = file_get_contents($file->getRealPath());

                $docFile->update([
                    $sluggedFilename => $blob,
                ]);

                if ($docFile){ 
                    Checklist::updateOrCreate(
                        [
                            'document_id' => $docu->id
                        ],
                        [
                            $sluggedFilename => true
                        ]
                    );

                    $this->dispatch('fileUploded');
                }
            }

            $this->reset('file_uploads');
        } catch (\Exception $e) {
            session()->flash('message', 'Failed to upload: ' . Str::limit($e->getMessage(), 30));
            $this->reset('file_uploads');
        }

        $this->mount();
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

        if($this->docs){
            $documents = DocumentFile::where('document_id', $this->docs->id)->get();
        }
        
        return view('livewire.grade12.student-documents', [
            'documents' => $documents
        ]);
    }
}
