<?php

namespace App\Livewire\Grade11;

use App\Models\Strand;
use Livewire\Component;

class SchoolYearModal extends Component
{
    public $addSchoolYearModal = false, $addSectionModal = false;
    public $schoolYear = '';

    protected $rules = [
        'schoolYear' => 'required|string|max:255',
    ];

    // protected $listeners = ['openModal'];  
    
    public function addSchoolYear()
    {
        $this->resetValidation();
        $this->reset('schoolYear');
        $this->addSchoolYearModal = true;  
    }

    public function addSection()
    {
        $this->resetValidation();
        $this->addSectionModal = true;
    }

    public function save()
    {
        $this->validate();  

        logger('Saved school year: ' . $this->schoolYear);

        $this->dispatchBrowserEvent('notify', 'School Year saved!');  
        $this->addSchoolYearModal = false;  
    }

    public function render()
    {
        $strands = Strand::all();

        return view('livewire.grade11.school-year-modal', [
            'strands' => $strands
        ]);
    }
}
