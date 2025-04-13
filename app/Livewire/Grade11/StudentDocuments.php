<?php

namespace App\Livewire\Grade11;

use App\Models\DocumentRecord;
use Livewire\Component;
use Livewire\WithPagination;

class StudentDocuments extends Component
{
    use WithPagination;

    public function render()
    {
        $documents = DocumentRecord::latest()->paginate(1); // Customize items per page

        return view('livewire.grade11.student-documents', [
            'documents' => $documents
        ]);
    }
}
