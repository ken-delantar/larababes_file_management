<x-app-layout>
    <div class="py-12">

        {{-- <div 
            x-data
            x-on:notify.window="alert($event.detail)"
        >
        </div> --}}

        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-6">
                {{-- <div>
                    @livewire('Grade11.filtering-and-modals')
                </div>
 
                <div class="mt-3">
                    @livewire('Grade11.student-table')
                </div> --}}

                

                {{-- <div class="mt-3">
                    @livewire('Grade11.checklist-table')
                </div> --}}

                {{-- <div class="mt-3">
                    @livewire('Grade11.checklist')
                </div> --}}
                
                {{-- <div class="mt-5">
                    @livewire('Grade11.student-information')
                </div> --}}
            </div>
        </div>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @livewire('Grade11.add-student')
        </div>
    </div>
</x-app-layout>
