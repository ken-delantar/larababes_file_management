<?php

namespace App\Livewire;

use App\Models\Student;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class DocumentChecklist extends DataTableComponent
{
    protected $model = Student::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {
        return Student::query()->with('document.checklist');
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
                ->footer(fn($rows) => $rows->filter(fn($row) => $this->check($row, 'form_137') === 1)->count()),

            Column::make("Form 138")
                ->label(fn($row) => $this->check($row, 'form_138'))
                ->footer(fn($rows) => $rows->filter(fn($row) => $this->check($row, 'form_138') === 1)->count()),

            Column::make("Good Moral")
                ->label(fn($row) => $this->check($row, 'good_moral'))
                ->footer(fn($rows) => $rows->filter(fn($row) => $this->check($row, 'good_moral') === 1)->count()),

            Column::make("PSA")
                ->label(fn($row) => $this->check($row, 'psa'))
                ->footer(fn($rows) => $rows->filter(fn($row) => $this->check($row, 'psa') === 1)->count()),

            Column::make("Pic")
                ->label(fn($row) => $this->check($row, 'pic'))
                ->footer(fn($rows) => $rows->filter(fn($row) => $this->check($row, 'pic') === 1)->count()),

            Column::make("ESC Certificate")
                ->label(fn($row) => $this->check($row, 'esc_certificate'))
                ->footer(fn($rows) => $rows->filter(fn($row) => $this->check($row, 'esc_certificate') === 1)->count()),

            Column::make("Brgy Certificate")
                ->label(fn($row) => $this->check($row, 'brgy_certificate'))
                ->footer(fn($rows) => $rows->filter(fn($row) => $this->check($row, 'brgy_certificate') === 1)->count()),

            Column::make("NCAE")
                ->label(fn($row) => $this->check($row, 'ncae'))
                ->footer(fn($rows) => $rows->filter(fn($row) => $this->check($row, 'ncae') === 1)->count()),

            Column::make("AF Five")
                ->label(fn($row) => $this->check($row, 'af_five'))
                ->footer(fn($rows) => $rows->filter(fn($row) => $this->check($row, 'af_five') === 1)->count()),
        ];
    }

    private function check($row, $field): int
    {
        return optional($row->document?->checklist)->$field ? 1 : 0;
    }
}
