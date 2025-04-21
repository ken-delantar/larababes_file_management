<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            <div class="flex">
                <x-dropdown>
                    <x-slot name="trigger">
                        <x-secondary-button class="px-4 py-2 rounded flex items-center space-x-2">
                            <span>School Year</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </x-secondary-button>
                    </x-slot>
                
                    <x-slot name="content">
                        @foreach ($school_years as $school_year)
                            <x-dropdown-link>
                                {{ $school_year->year_start }} - {{ $school_year->year_end }}
                            </x-dropdown-link>
                        @endforeach
            
                        {{-- <x-dropdown-link wire:click="addSchoolYear" type="button">
                            ADD S.Y
                        </x-dropdown-link> --}}
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <div class="bg-white rounded-lg shadow p-6 flex items-center space-x-4">
                    <div class="p-3 bg-blue-100 text-blue-600 rounded-full">
                        <i class="fas fa-users text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-gray-500 text-sm">Total Students</h3>
                        <p class="text-2xl font-bold text-gray-800">{{ count($students) }}</p>
                    </div>
                </div>

                @foreach ($strands as $strand)
                    @php
                        $count = $academic_records->where('strand_id', $strand->id)->count();
                    @endphp

                    <div class="bg-white rounded-lg shadow p-6 flex items-center space-x-4">
                        <div class="p-3 bg-green-100 text-green-600 rounded-full">
                            <i class="fas fa-graduation-cap text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-gray-500 text-sm">{{ $strand->strand }}</h3>
                            <p class="text-2xl font-bold text-gray-800">{{ $count }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Chart Section --}}
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">📊 Students Distribution</h2>
                <div class="h-80">
                    <canvas id="studentsChart"></canvas>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- Chart JS Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('studentsChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['STEM', 'ABM', 'HUMSS', 'GAS'],
                    datasets: [{
                        label: 'Students per Strand',
                        data: [400, 300, 250, 250],
                        backgroundColor: [
                            'rgba(59, 130, 246, 0.7)',
                            'rgba(16, 185, 129, 0.7)',
                            'rgba(245, 158, 11, 0.7)',
                            'rgba(244, 63, 94, 0.7)'
                        ],
                        borderColor: [
                            'rgba(59, 130, 246, 1)',
                            'rgba(16, 185, 129, 1)',
                            'rgba(245, 158, 11, 1)',
                            'rgba(244, 63, 94, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>
