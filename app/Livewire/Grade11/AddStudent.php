<?php

namespace App\Livewire\Grade11;


use App\Models\Strand;
use App\Models\Section;
use Livewire\Component;
use App\Models\SchoolYear;

class AddStudent extends Component
{
    public $name, $sex, $student_number, $school_year, $strand, $section, $category, $billing_status, $status, $condition, $lrn, $school_origin;

    // protected $rules = [
    //     'name' => 'required|string|max:255',
    //     'sex' => 'required|in:Male,Female', // assuming Male or Female is the only option
    //     'student_number' => 'required|integer', // assuming student number is numeric
    //     'school_year' => 'required|exists:school_years,id', // ensure that the selected school year exists in the database
    //     'strand' => 'required|exists:strands,id', // ensure that the selected strand exists in the database
    //     'section' => 'required|exists:sections,id', // ensure that the selected section exists in the database
    //     'category' => 'required|in:VPB,Payee,Pending', // assuming these are the only options for category
    //     'billing_status' => 'required|in:Billing,Not billing',
    //     'status' => 'required|in:Active,Inactive',
    //     'condition' => 'nullable|string|max:255', // optional field for condition
    //     'lrn' => 'required|integer', // assuming LRN is a 12-digit number
    //     'school_origin' => 'required|in:Public,Private', // assuming these are the only options
    // ];

    public $school_years; 
    public $strands;
    public $sections;

    // public function save(){
    //     $this->validate([
    //         'name' => 'required'
    //     ]);

    //     return redirect()->route('checklist_grade_11');
    // }

    public function initData(){
        $this->school_years = SchoolYear::all();
        $this->strands = Strand::all();
        $this->sections = Section::all();
    }
    
    public function render()
    {
        $this->initData();

        return view('livewire.grade11.add-student', [
            'school_years' => $this->school_years,
            'strands' => $this->strands,
            'sections' => $this->sections
        ]);
    }    
}
