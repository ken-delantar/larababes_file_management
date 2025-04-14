@php
    $docs = \App\Models\Document::find($document['document_id']);
    $student = \App\Models\Student::find($docs->student_id);
@endphp

<div>
    {{ $student->id }}<br>
    {{ $student->name }}
</div>
