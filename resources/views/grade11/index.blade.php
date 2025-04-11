<x-app-layout>
    <x-slot name='slot'>
        <style>
            .w-full.mx-auto.sm\:px-6.lg\:px-8 {
                overflow: visible !important;
                position: relative;
            }
            .bg-white.dark\:bg-gray-800.shadow-xl.sm\:rounded-lg.p-6 {
                overflow: visible !important;
                position: relative;
            }
            .laravel-livewire-tables .filters-container .select-filter {
                z-index: 1000;
            }
            .laravel-livewire-tables .filters-container .select-filter select {
                max-height: 300px;
                overflow-y: auto;
            }
        </style>
        @if ($view === 'data')
            <div class="w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-6">
                    <div>
                        @livewire('Grade11.filtering-and-modals')
                    </div>

                    <div class="mt-3">
                        @livewire('Grade11.student-table')
                    </div>
                </div>
            </div>
        @endif

        @if ($view === 'add_student')
            <div>
                @livewire('Grade11.add-student')
            </div>
        @endif

        @if ($view === 'student_profile')
            @livewire('Grade11.student-profile', [
                'academic_record' => $academic_record
            ])
        @endif
    </x-slot>
</x-app-layout>