<?php

namespace App\Livewire;

use App\Models\Checklist;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class DocumentChecklist extends DataTableComponent
{
    protected $model = Checklist::class;

    public function configure(): void
    {
        $this->setPrimaryKey('checklists.id');
    }

    public function builder(): Builder
    {
        return Checklist::query()
            ->select('checklists.*', 'students.name as student_name', 'students.id as student_id')
            ->leftJoin('documents', 'checklists.document_id', '=', 'documents.id')
            ->leftJoin('students', 'documents.student_id', '=', 'students.id');
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")->hideIf(true),

            Column::make('Student Name', 'student_name')
                ->sortable()
                ->searchable()
                ->label(function ($row) {
                    return view('livewire.checklist-additional-details', ['row' => $row]);
                }),

            Column::make("Document ID", "document_id")->hideIf(true),

            Column::make("Form 137", "form_137")
                ->sortable()
                ->footer(fn($rows) => $rows->filter(fn($row) => $row->form_137)->count()),

            Column::make("Form 138", "form_138")
                ->sortable()
                ->footer(fn($rows) => $rows->filter(fn($row) => $row->form_138)->count()),

            Column::make("Good Moral", "good_moral")
                ->sortable()
                ->footer(fn($rows) => $rows->filter(fn($row) => $row->good_moral)->count()),

            Column::make("PSA", "psa")
                ->sortable()
                ->footer(fn($rows) => $rows->filter(fn($row) => $row->psa)->count()),

            Column::make("PIC", "pic")
                ->sortable()
                ->footer(fn($rows) => $rows->filter(fn($row) => $row->pic)->count()),

            Column::make("ESC Certificate", "esc_certificate")
                ->sortable()
                ->footer(fn($rows) => $rows->filter(fn($row) => $row->esc_certificate)->count()),

            Column::make("Brgy Certificate", "brgy_certificate")
                ->sortable()
                ->footer(fn($rows) => $rows->filter(fn($row) => $row->brgy_certificate)->count()),

            Column::make("NCAE", "ncae")
                ->sortable()
                ->footer(fn($rows) => $rows->filter(fn($row) => $row->ncae)->count()),

            Column::make("AF Five", "af_five")
                ->sortable()
                ->footer(fn($rows) => $rows->filter(fn($row) => $row->af_five)->count()),
        ];
    }
}
