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
        
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-6">
                @livewire('document-checklist')
            </div>
        </div>
    </x-slot>
</x-app-layout>