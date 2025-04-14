<?php

namespace App\Livewire\Grade12;

use App\Models\AcademicRecord;
use App\Models\FinancialRecord;
use App\Models\Strand;
use App\Models\Section;
use Livewire\Component;
use App\Models\SchoolYear;
use App\Models\Student;
use Exception;

class AddStudent extends Component
{
    public $name, $sex, $student_number, $school_year, $strand, $section, $category, $billing_status, $status, $condition, $lrn, $school_origin;

    protected $rules = [
        'name' => 'required|string|max:255',
        'sex' => 'required|in:Male,Female', 
        'student_number' => 'required|integer', 
        'school_year' => 'required|exists:school_years,id', 
        'strand' => 'required|exists:strands,id', 
        'section' => 'required|exists:sections,id', 
        'category' => 'required|in:VPB,Payee,Pending', 
        'billing_status' => 'required|in:Billing,Not billing',
        'status' => 'required|in:Active,Inactive',
        'condition' => 'nullable|string|max:255',
        'lrn' => 'required|integer',
        'school_origin' => 'required|in:Public,Private', 
    ];

    public $school_years; 
    public $strands;
    public $sections;

    public function save(){
        $this->validate();

        try {
            $student = Student::create([
                'id' => $this->student_number,
                'name' => $this->name,
                'lrn' => $this->lrn,
                'sex' => $this->sex,
                'school_origin' => $this->school_origin,
                'condition' => $this->condition,
                'status' => $this->status,
            ]);

            AcademicRecord::create([
                'student_id' => $student->id,
                'strand_id' => $this->strand,
                'school_year_id' => $this->school_year,
                'section_id' => $this->section
            ]);

            FinancialRecord::create([
                'student_id' => $student->id,
                'category' => $this->category,
                'billing_status' => $this->billing_status,
                'vms_billing_status' => 'Not Specified'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', 'Student added succesfully.');
    }

    public function back()
    {
        $this->reset();
        return redirect()->route('index_grade_11', 'data');
    }

    public function mount()
    {
        $this->initData();
    }

    public function initData(){
        $this->school_years = SchoolYear::all();
        $this->strands = Strand::all();
        $this->sections = Section::all();
    }
    
    public function render()
    {
        return view('livewire.grade12.add-student', [
            'school_years' => $this->school_years,
            'strands' => $this->strands,
            'sections' => $this->sections
        ]);
    }    
}
