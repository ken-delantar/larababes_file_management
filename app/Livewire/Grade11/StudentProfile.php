<?php

namespace App\Livewire\Grade11;

use Livewire\Component;
use App\Models\AcademicRecord;
use App\Models\FinancialRecord;
use App\Models\SchoolYear;
use App\Models\Section;
use App\Models\Strand;
use App\Models\Student;

class StudentProfile extends Component
{
    public $school_years, $strands, $sections;

    public $academic_records;
    public $financial_records;
    public $student;

    public $student_id;
    public $name, $email = '', $sex;
    public $school_year_11, $strand_11, $section_11, $year_end_status_11;
    public $category = '', $billing_status, $vms_billing_status, $approved_voucher, $payee_fee;
    public $lrn, $school_origin;

    public function mount($academic_record)
    {
        $acads = AcademicRecord::find($academic_record);

        $this->student = Student::find($acads->student_id);
        $this->academic_records = AcademicRecord::where('student_id', $this->student->id)->first();
        $this->financial_records = FinancialRecord::where('student_id', $this->student->id)->first();

        $this->school_years = SchoolYear::all();
        $this->strands = Strand::all();
        $this->sections = Section::all();

        $this->student_id = $this->student->id;
        $this->name = $this->student->name;
        $this->sex = $this->student->sex;

        if ($this->academic_records) {
            $this->school_year_11 = $this->academic_records->school_year_id;
            $this->strand_11 = $this->academic_records->strand_id;
            $this->section_11 = $this->academic_records->section_id;
            $this->year_end_status_11 = $this->academic_records->year_end_status;
        }

        if ($this->financial_records) {
            $this->category = $this->financial_records->category;
            $this->billing_status = $this->financial_records->billing_status;
            $this->vms_billing_status = $this->financial_records->vms_billing_status;
            $this->approved_voucher = $this->financial_records->approved_voucher;
            $this->payee_fee = $this->financial_records->payee_fee;
        }

        $this->lrn = $this->student->lrn;
        $this->school_origin = $this->student->school_origin;
    }

    public function updateAllStudentInformation()
    {
        $this->update_student_profile();
        $this->update_academic_record();
        $this->update_additional_information();
        $this->dispatch('updated');
    }

    public function update_student_profile()
    {
        // public $name, $email = 'juandelacruz@email.com', $sex;
        $this->validate([
            'name' => 'required|string|max:255',
            'sex' => 'required|in:Male,Female'
        ]);

        $this->student->name = $this->name;
        $this->student->sex = $this->sex;
        $this->student->save();
    }

    public function update_academic_record()
    {
        //public $school_year_11, $strand_11, $section_11, $year_end_status_11;
        $this->validate([
            'student_id' => 'required|integer',
            'school_year_11' => 'required|exists:school_years,id',
            'strand_11' => 'required|exists:strands,id',
            'section_11' => 'required|exists:sections,id',
            'year_end_status_11' => 'nullable'
        ]);

        $this->student->id = $this->student_id;
        $this->student->save();

        $this->academic_records->student_id = $this->student_id;
        $this->academic_records->school_year_id = $this->school_year_11;
        $this->academic_records->strand_id = $this->strand_11;
        $this->academic_records->section_id = $this->section_11;
        $this->academic_records->year_end_status = $this->year_end_status_11;
        $this->academic_records->save();
    }

    public function update_additional_information()
    {
        // public $lrn, $school_origin;

        $this->school_origin = trim(ucfirst(strtolower($this->school_origin)));

        $this->validate([
            'lrn' => 'required|integer',
            'school_origin' => 'required|in:Public,Private'
        ]);

        $this->student->lrn = $this->lrn;
        $this->student->school_origin = $this->school_origin;
        $this->student->save();
    }

    public function render()
    {
        return view('livewire.grade11.student-profile');
    }
}
