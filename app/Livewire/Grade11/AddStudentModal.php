<?php

namespace App\Livewire\Grade11;

// use Livewire\Component;
use WireElements\Pro\Components\Modal\Modal;


class AddStudentModal extends Modal
{
    public function render()
    {
        return view('livewire.grade11.add-student-modal');
    }
}
