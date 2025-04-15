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
                ->searchable(),
            Column::make("Document id", "document_id")
                ->hideIf(true),
                Column::make("Form 137", "form_137")
                ->sortable()
                ->footer(function($rows) {
                    return $rows->filter(fn($row) => $row->form_137)->count();
                }),
            
            Column::make("Form 138", "form_138")
                ->sortable()
                ->footer(function($rows) {
                    return $rows->filter(fn($row) => $row->form_138)->count();
                }),
            
            Column::make("Good moral", "good_moral")
                ->sortable()
                ->footer(function($rows) {
                    return $rows->filter(fn($row) => $row->good_moral)->count();
                }),
            
            Column::make("Psa", "psa")
                ->sortable()
                ->footer(function($rows) {
                    return $rows->filter(fn($row) => $row->psa)->count();
                }),
            
            Column::make("Pic", "pic")
                ->sortable()
                ->footer(function($rows) {
                    return $rows->filter(fn($row) => $row->pic)->count();
                }),
            
            Column::make("Esc certificate", "esc_certificate")
                ->sortable()
                ->footer(function($rows) {
                    return $rows->filter(fn($row) => $row->esc_certificate)->count();
                }),
            
            Column::make("Brgy certificate", "brgy_certificate")
                ->sortable()
                ->footer(function($rows) {
                    return $rows->filter(fn($row) => $row->brgy_certificate)->count();
                }),
            
            Column::make("Ncae", "ncae")
                ->sortable()
                ->footer(function($rows) {
                    return $rows->filter(fn($row) => $row->ncae)->count();
                }),
            
            Column::make("Af five", "af_five")
                ->sortable()
                ->footer(function($rows) {
                    return $rows->filter(fn($row) => $row->af_five)->count();
                }),
        ];
    }
}
