<?php

namespace App\Livewire;

use App\Models\Student;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class DocumentChecklist extends DataTableComponent
{
    protected $model = Student::class;

    // Store totals here
    public array $documentTotals = [];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {
        return Student::query()->with('document.checklist');
    }

    // Called automatically by Livewire on mount and whenever table updates
    public function updatedFilters()
    {
        $this->calculateTotals();
    }

    public function mount()
    {
        $this->calculateTotals();
    }

    protected function calculateTotals()
    {
        // Initialize counts for each document field
        $fields = [
            'form_137',
            'form_138',
            'good_moral',
            'psa',
            'pic',
            'esc_certificate',
            'brgy_certificate',
            'ncae',
            'af_five',
        ];

        // Initialize counts
        $this->documentTotals = array_fill_keys($fields, 0);

        // Get all student IDs in the current filtered builder
        $studentIds = $this->builder()->pluck('id');

        // Load students with documents and checklist for those IDs
        $students = Student::whereIn('id', $studentIds)->with('document.checklist')->get();

        foreach ($students as $student) {
            $checklist = optional($student->document)->checklist;
            foreach ($fields as $field) {
                if ($checklist && $checklist->$field) {
                    $this->documentTotals[$field]++;
                }
            }
        }
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")->hideIf(true),

            Column::make("Student Name", "name")
                ->sortable()
                ->searchable(),

            Column::make("Form 137")
                ->label(fn($row) => $this->check($row, 'form_137'))
                ->footer(fn() => $this->documentTotals['form_137'] ?? 0),

            Column::make("Form 138")
                ->label(fn($row) => $this->check($row, 'form_138'))
                ->footer(fn() => $this->documentTotals['form_138'] ?? 0),

            Column::make("Good Moral")
                ->label(fn($row) => $this->check($row, 'good_moral'))
                ->footer(fn() => $this->documentTotals['good_moral'] ?? 0),

            Column::make("PSA")
                ->label(fn($row) => $this->check($row, 'psa'))
                ->footer(fn() => $this->documentTotals['psa'] ?? 0),

            Column::make("Pic")
                ->label(fn($row) => $this->check($row, 'pic'))
                ->footer(fn() => $this->documentTotals['pic'] ?? 0),

            Column::make("ESC Certificate")
                ->label(fn($row) => $this->check($row, 'esc_certificate'))
                ->footer(fn() => $this->documentTotals['esc_certificate'] ?? 0),

            Column::make("Brgy Certificate")
                ->label(fn($row) => $this->check($row, 'brgy_certificate'))
                ->footer(fn() => $this->documentTotals['brgy_certificate'] ?? 0),

            Column::make("NCAE")
                ->label(fn($row) => $this->check($row, 'ncae'))
                ->footer(fn() => $this->documentTotals['ncae'] ?? 0),

            Column::make("AF Five")
                ->label(fn($row) => $this->check($row, 'af_five'))
                ->footer(fn() => $this->documentTotals['af_five'] ?? 0),
        ];
    }

    private function check($row, $field): int
    {
        return optional($row->document?->checklist)->$field ? 1 : 0;
    }
}
