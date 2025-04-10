<?php

namespace App\Livewire\Grade11;

use App\Models\Student;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Columns\Column as Col;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Illuminate\Support\Facades\Route;

class StudentTable extends DataTableComponent
{
    protected $model = Student::class;

    //Model SchoolYear - column id, 
    //Model Strand - column id, strand
    //Model Section - column id, section_number
    //Model AcademicRecord = column id, student_id, strand_id, school_id, section_id

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableRowUrl(fn () => route('dashboard'))
            ->setEagerLoadAllRelationsStatus(true);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->searchable(),

            Column::make("Name", "name")
                ->sortable()
                ->searchable(),

            Column::make("Lrn", "lrn")
                ->sortable()
                ->searchable(),
            
            // Column::make("AcademicRecord", "latest_academic_record.id"),

            Column::make("Sex", "sex")
                ->sortable(),

            Column::make("School origin", "school_origin")
                ->sortable(),

            Column::make("Condition", "condition")
                ->sortable(),

            Column::make("Status", "status")
                ->sortable(),

            Column::make('Actions')
                ->label(
                    fn ($row, Column $column) => view('livewire.grade11.student-table-actions')
                        ->with('student', $row)
                )
                ->unclickable(),
        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Sex')
                ->options([
                    '' => 'All',
                    'Male' => 'Male',
                    'Female' => 'Female',
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('sex', $value);
                }),
            SelectFilter::make('School Origin')
                ->options([
                    '' => 'All',
                    'Public' => 'Public',
                    'Private' => 'Private',
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('school_origin', $value);
                }),
            SelectFilter::make('Status')
                ->options([
                    '' => 'All',
                    'Active' => 'Active',
                    'Inactive' => 'Inactive',
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('status', $value);
                }),
        ];
    }
}