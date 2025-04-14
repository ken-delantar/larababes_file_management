<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Checklist;

class DocumentChecklist extends DataTableComponent
{
    protected $model = Checklist::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->hideIf(true),
            Column::make('Student')
                ->label(fn ($row, Column $column) => view('livewire.checklist-additional-details')->with('document', $row))
                ->unclickable(),
            Column::make("Document id", "document_id")
                ->hideIf(true),
            Column::make("Form 137", "form_137")
                ->sortable(),
            Column::make("Form 138", "form_138")
                ->sortable(),
            Column::make("Good moral", "good_moral")
                ->sortable(),
            Column::make("Psa", "psa")
                ->sortable(),
            Column::make("Pic", "pic")
                ->sortable(),
            Column::make("Esc certificate", "esc_certificate")
                ->sortable(),
            Column::make("Diploma", "diploma")
                ->sortable(),
            Column::make("Brgy certificate", "brgy_certificate")
                ->sortable(),
            Column::make("Ncae", "ncae")
                ->sortable(),
            Column::make("Af five", "af_five")
                ->sortable(),
        ];
    }
}
