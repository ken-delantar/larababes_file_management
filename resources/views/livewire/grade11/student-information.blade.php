<div class="p-6 space-y-6">
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800">Marvel Ken John Ferrer</h2>
    </x-slot>

    <x-section-title>
        <x-slot name="title">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Left Info Column -->
                <div class="space-y-2">
                    <p class="text-lg font-medium text-gray-800">
                        Student ID: <span class="text-gray-600">210100000</span>
                    </p>
                    <p class="text-lg font-medium text-gray-800">
                        LRN: <span class="text-gray-600">136666666666666</span>
                    </p>
                    <p class="text-lg font-medium text-gray-800">
                        Sex: <span class="text-gray-600">Once a week daw</span>
                    </p>
                </div>

                <!-- Right Info Column -->
                <div class="space-y-2">
                    <p class="text-lg font-medium text-gray-800">Strand: <span class="text-gray-600">ICT</span></p>
                    <p class="text-lg font-medium text-gray-800">Section: <span class="text-gray-600">1104</span></p>
                    <p class="text-lg font-medium text-gray-800">Status: <span class="text-gray-600">Enrolled</span></p>
                </div>
            </div>
        </x-slot>

        <x-slot name="description">
            <div class="mt-10">
                <x-action-section>
                    <x-slot name="title">
                        <h3 class="text-xl font-semibold text-gray-800">Upload Documents</h3>
                    </x-slot>
    
                    <x-slot name="description">
                        <h4 class="mb-4 font-medium text-gray-700">Checklist:</h4>
    
                        <div class="space-y-2">
                            @foreach (range(1, 5) as $i)
                                <div class="flex items-center gap-2">
                                    <x-checkbox id="form_137_{{ $i }}" />
                                    <x-label for="form_137_{{ $i }}" value="Form 137" />
                                </div>
                            @endforeach
                        </div>
                    </x-slot>
    
                    <x-slot name="content">
                        <div class="mt-4">
                            <x-label for="file" value="Choose file" class="block text-sm font-medium text-gray-700" />
                            <x-input id="file" type="file" class="mt-1 block w-full" />
                        </div>
                    </x-slot>
                </x-action-section>
            </div>
        </x-slot>

        <x-slot name="aside">
            <div class="flex gap-2 mt-4">
                <x-secondary-button>Action 2</x-secondary-button>
                <x-button>Action 1</x-button>
            </div>
        </x-slot>
    </x-section-title>
</div>
