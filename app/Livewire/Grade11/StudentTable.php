<?php

namespace App\Livewire\Grade11;

use App\Models\Student;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class StudentTable extends DataTableComponent
{

    protected $model = Student::class;

    public function query()
    {
        $query = Student::query();

        return $query;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Student id", "student_id")
                ->sortable()
                ->searchable(),

            Column::make("Name", "name")
                ->sortable()
                ->searchable(),

            Column::make("Lrn", "lrn")
                ->sortable()
                ->searchable(),

            Column::make("Sex", "sex")
                ->sortable(),

            Column::make("School origin", "school_origin")
                ->sortable(),

            Column::make("Condition", "condition")
                ->sortable(),

            Column::make("Status", "status")
                ->sortable(),

            Column::make("Created at", "created_at")
                ->sortable(),

            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
