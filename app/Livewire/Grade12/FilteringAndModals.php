<?php

namespace App\Livewire\Grade12;

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

    // Filtering variables
    public $schoolYearFilter = null;
    public $strandFilter = null;
    public $sectionFilter = null;

    public $school_years;
    public $strands;
    public $sections;

    public function mount()
    {
        $this->school_years = SchoolYear::all();
        $this->strands = Strand::all();
        $this->sections = Section::where('grade_level', 12)->get();
    }

    // Show section modal
    public function addSchoolYear()
    {
        $this->addSchoolYearModal = true;
    }

    public function addSection()
    {
        $this->addSectionModal = true;
    }

    // Save School Year or Section
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
                    'school_year' => $this->schoolYearStart . '-' . $this->schoolYearEnd,
                    'start_of_class' => $formattedClassStart,
                ]);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
    
            $this->dispatch('notify', 'School Year saved!');
            $this->addSchoolYearModal = false;
            
            return $this->mount();

        } else if ($selection === 'section') {
            
            $this->validate([
                'sectionSchoolYear' => ['required'],
                'sectionStrand' => ['required'],
                'sectionNumber' => ['required', 'integer']
            ]);

            try {
                Section::create([
                    // 'school_year_id' => $this->sectionSchoolYear,
                    // 'strand_id' => $this->sectionStrand,
                    'section_number' => 12 . $this->sectionNumber,
                    'grade_level' => 12,
                ]);

                $this->dispatch('notify', 'Section saved!');
                $this->addSectionModal = false;
                
                return $this->mount();
            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }

    public function addStudent(){
        return redirect()->route('index_grade_12', 'add_student');
    }

    // Render view
    public function render()
    {
        return view('livewire.grade12.filtering-and-modals', [
            'strands' => $this->strands,
            'school_years' => $this->school_years,
            'sections' => $this->sections
        ]);
    }
}
