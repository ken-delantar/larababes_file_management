<?php

namespace App\Livewire\Grade11;

use Livewire\Component;

class StudentTableActions extends Component
{
    public $student;

    public function mount($student = null)
    {
        $this->student = $student;
    }

    public function render()
    {
        return view('livewire.grade11.student-table-actions', [
            'student' => $this->student
        ]);
    }
}
