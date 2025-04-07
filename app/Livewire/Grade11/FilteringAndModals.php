<?php

namespace App\Livewire\Grade11;

use Carbon\Carbon;
use App\Models\Strand;
use Livewire\Component;
use App\Models\SchoolYear;
use App\Models\Section;

class FilteringAndModals extends Component
{
    public $addSchoolYearModal = false, $addSectionModal = false;
    public $schoolYearStart, $schoolYearEnd, $classStart;
    public $sectionSchoolYear, $sectionStrand, $sectionNumber;

    //show section modal
    public function addSection()
    {
        $this->addSectionModal = true;
    }

    public function save($selection = '')
    {   
        if ($selection === 'school_year') {

            $this->validate([
                'schoolYearStart' => ['required', 'digits:4', 'integer', 'lt:schoolYearEnd'],
                'schoolYearEnd' => ['required', 'digits:4', 'integer', 'gt:schoolYearStart'],
                'classStart' => ['nullable', 'date'], 
            ]);               
    
            try {
                $formattedClassStart = $this->classStart
                    ? Carbon::parse($this->classStart) 
                    : null;
                    
                SchoolYear::create([
                    'year_start' => $this->schoolYearStart,
                    'year_end' => $this->schoolYearEnd,
                    'start_of_class' => $formattedClassStart,
                ]);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
    
            $this->dispatch('notify', 'School Year saved!');
            $this->addSchoolYearModal = false;

        } else if ($selection === 'section') {
            
            $this->validate([
                'sectionSchoolYear' => ['required'],
                'sectionStrand' => ['required'],
                'sectionNumber' => ['required', 'integer']
            ]);

            try {
                Section::create([
                    'school_year_id' => $this->sectionSchoolYear,
                    'strand_id' => $this->sectionStrand,
                    'section_name' => $this->sectionNumber,
                    'grade_level' => 11,
                ]);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }

        }
    }

    public function render()
    {
        $strands = Strand::all();
        $school_years = SchoolYear::all();
        $sections = Section::all();
        
        return view('livewire.grade11.filtering-and-modals', [
            'strands' => $strands,
            'school_years' => $school_years,
            'sections' => $sections
        ]);
    }
}
