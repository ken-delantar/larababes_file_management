<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GradeElevenController extends Controller
{
    public function render($view){
        return view('grade11.index', compact('view'));
    }

    public function student_profile($view, $academic_record){
        return view('grade11.index', compact('view', 'academic_record'));
    }
}
