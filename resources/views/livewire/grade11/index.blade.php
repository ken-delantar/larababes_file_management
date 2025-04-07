<x-app-layout>
    <div class="py-12">

        {{-- <div 
            x-data
            x-on:notify.window="alert($event.detail)"
        >
        </div> --}}

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
    </div>
</x-app-layout>
