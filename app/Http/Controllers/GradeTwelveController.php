<?php

namespace App\Http\Controllers;

use App\Models\DocumentRecord;
use App\Models\Document;
use Illuminate\Http\Request;

class GradeTwelveController extends Controller
{
    public function render($view){
        return view('grade12.index', compact('view'));
    }

    public function student_profile($view, $academic_record){
        return view('grade12.index', compact('view', 'academic_record'));
    }

    public function student_documents($view, $student_id){
        return view('grade12.index', compact('view', 'student_id'));
    }

    // public function upload_file(Request $request){
    //     // 231103388

    //     $request->validate([
    //         'file' => 'required|file|max:10240|mimetypes:application/pdf,image/jpeg,image/png,image/gif',
    //     ]);
        
    
    //     $file = $request->file('file');
    //     $blob = file_get_contents($file->getRealPath());
    
    //     $doc = Document::create([
    //         'student_id' => 231103388
    //     ]);

    //     DocumentRecord::create([
    //         'document_id' => $doc->id,
    //         'type' => 'IMG,PDF',
    //         'docs' => $blob
    //     ]);
    
    //     return back()->with('success', 'PDF uploaded successfully to the database.');
    // }
}
