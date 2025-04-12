<?php

namespace App\Livewire\Grade11;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\AcademicRecord;
use App\Models\SchoolYear;
use App\Models\Strand;
use App\Models\Section;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class StudentTable extends DataTableComponent
{
    protected $model = AcademicRecord::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableRowUrl(fn ($row) => route('index_grade_11_profile', ['student_profile', 'academic_record' => $row]))
            ->setEagerLoadAllRelationsStatus(true)
            ->setLoadingPlaceholderEnabled()
            ->setLoadingPlaceholderStatus(true);
    }

    public function builder(): Builder
    {
        $query = AcademicRecord::query()
            ->with(['student', 'section', 'schoolYear', 'strand'])
            ->whereHas('section', function ($query) {
                $query->where('grade_level', 11); 
            });

        if (isset($this->filters['school_year']) && $this->filters['school_year']) {
            $query->whereHas('schoolYear', function ($query) {
                $query->where('id', $this->filters['school_year']);
            });
        }

        if (isset($this->filters['strand']) && $this->filters['strand']) {
            $query->whereHas('strand', function ($query) {
                $query->where('id', $this->filters['strand']);
            });
        }

        if (isset($this->filters['section']) && $this->filters['section']) {
            $query->whereHas('section', function ($query) {
                $query->where('id', $this->filters['section']);
            });
        }

        return $query;
    }

    public function columns(): array
    {
        return [
            Column::make('id', 'id')->hideIf(true),
            Column::make("student id", 'student.id')->sortable(),
            Column::make("Name", 'student.name')->sortable()->searchable(),
            Column::make("LRN", 'student.lrn')->searchable(),
            Column::make("S.Y", 'schoolYear.school_year')->searchable(),
            Column::make("Strand", 'strand.strand')->sortable()->searchable(),
            Column::make("Section", 'section.section_number')->sortable()->searchable(),
            Column::make("School Origin", 'student.school_origin')->sortable()->searchable(),
            Column::make("Status", "student.status")->sortable(),
            Column::make('Actions')
                ->label(fn ($row, Column $column) => view('livewire.grade11.student-table-actions')->with('student', $row))
                ->unclickable(),
        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('School Year')
                ->options(
                    SchoolYear::all()->pluck('school_year', 'id')->toArray() + [null => 'All']
                )
                ->filter(function (Builder $builder, string $value) {
                    if ($value) {
                        $builder->whereHas('schoolYear', function ($query) use ($value) {
                            $query->where('id', $value);
                        });
                    }
                }),

            SelectFilter::make('Strand')
                ->options(
                    Strand::all()->pluck('strand', 'id')->toArray() + [null => 'All']
                )
                ->filter(function (Builder $builder, string $value) {
                    if ($value) {
                        $builder->whereHas('strand', function ($query) use ($value) {
                            $query->where('id', $value);
                        });
                    }
                }),

            SelectFilter::make('Section')
                ->options(
                    Section::all()->pluck('section_number', 'id')->toArray() + [null => 'All']
                )
                ->filter(function (Builder $builder, string $value) {
                    if ($value) {
                        $builder->whereHas('section', function ($query) use ($value) {
                            $query->where('id', $value);
                        });
                    }
                }),
        ];
    }
}
