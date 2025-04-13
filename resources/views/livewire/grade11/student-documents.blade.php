<div class="bg-white dark:bg-gray-800 max-w-7xl mx-auto sm:px-6 lg:px-12 py-12 rounded shadow dark:shadow-lg">
    <x-section-title>
        <x-slot name='title'>
            Student Documents
        </x-slot>

        <x-slot name='description'>
            Upload and preview student-related documents such as PDFs or images.
        </x-slot>

        <x-slot name='aside'>
            <div class="text-right">
                <x-secondary-button type='button' wire:click='back'>
                    Back
                </x-secondary-button>
    
                <x-button type='button' wire:click='student_information'>
                    Information
                </x-button>
            </div>

            <div class="block">
                @if (session()->has('message'))
                <div 
                    x-data="{ show: true }" 
                    x-init="setTimeout(() => show = false, 5000)" 
                    x-show="show"
                    class="mt-2 text-sm px-4 py-2 rounded transition-all duration-300 ease-in-out"
                    :class="{
                        'text-green-600 dark:text-green-400 bg-green-100 dark:bg-green-900': '{{ session('type') }}' === 'success',
                        'text-red-600 dark:text-red-400 bg-red-100 dark:bg-red-900': '{{ session('type') }}' === 'error',
                    }"
                >
                    {{ session('message') }}
                </div>
            @endif
            </div>
        </x-slot>
    </x-section-title>

    <div class="flex flex-col md:flex-row gap-4 mt-4">
        <div class="flex-1 p-4 rounded bg-gray-50 dark:bg-gray-900">
            @forelse ($documents as $doc)
                <div class="space-y-8 h-96 pr-3">
                    <div>
                        <iframe src="{{ route('document.view', $doc->id) }}" class="w-full h-[400px] border border-gray-200 dark:border-gray-700 rounded"></iframe>
                    </div>
                </div>
            @empty
                <div class="text-center py-8">
                    <img src="https://cdn-icons-png.flaticon.com/512/833/833281.png" alt="No documents uploaded" class="mx-auto w-32 h-32 opacity-50 mb-4" />
                    <p class="text-gray-500">No documents uploaded yet.</p>
                </div>
            @endforelse

            @if ($documents)
                <div class="mt-8">
                    {{ $documents->links() }}
                </div>
            @endif

            <form wire:submit='uploadFile' class="mt-5">
                <div class="flex items-center gap-4 pr-12">

                    <input type="file" id="file_upload" wire:model="file_upload" accept="application/pdf, image/jpeg, image/jpg, image/png" class="w-full text-sm text-gray-500 dark:text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 dark:file:bg-blue-900 file:text-blue-700 dark:file:text-blue-300 hover:file:bg-blue-100 dark:hover:file:bg-blue-800" />

                    <x-secondary-button type='submit'>
                        Upload
                    </x-secondary-button>
                </div>
                @error('file_upload')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </form>
        </div>

        <div class="flex-1 p-4 rounded bg-gray-50 dark:bg-gray-900">
            <div class="w-full mb-5">
                <x-label for='student_id' value='Student #' class="dark:text-gray-300" />
                <x-input id="student_id" wire:model='student_id' class="w-full dark:bg-gray-800 dark:border-gray-700 dark:text-gray-100" />
            </div>
            
            <div class="w-full mb-5">
                <x-label for='name' value='Name' class="dark:text-gray-300" />
                <x-input id="name" wire:model='name' class="w-full dark:bg-gray-800 dark:border-gray-700 dark:text-gray-100" />
            </div>

            <x-section-border />

            <div class="w-full mb-5">
                <x-form-section submit=''>
                    <x-slot name='title'>
                        Document Checklist
                    </x-slot>
                    
                    <x-slot name='description'>
                        Note: This section shows the list of documents currently associated with the student.
                    </x-slot>                    

                    <x-slot name='form'>
                        <div class="flex gap-4 ">
                            <div class="flex-1">
                                @foreach ([
                                    'form_137' => 'Form 137',
                                    'form_138' => 'Form 138',
                                    'good_moral' => 'Good Moral',
                                    'psa' => 'PSA',
                                    'pic' => '2x2'
                                ] as $id => $label)
                                    <div class="flex items-center space-x-4 text-nowrap mb-4">
                                        <x-checkbox id="{{ $id }}" wire:model="{{ $id }}" />
                                        <x-label for="{{ $id }}" value="{{ $label }}" class="dark:text-gray-300" />
                                    </div>
                                @endforeach
                            </div>
                            
                            <div class="flex-1 pl-12">
                                @foreach ([
                                    'esc_certificate' => 'ESC Certificate',
                                    'diploma' => 'Diploma',
                                    'brgy_certificate' => 'Brgy. Certificate',
                                    'ncae' => 'NCAE',
                                    'af_five' => 'AF-5'
                                ] as $id => $label)
                                    <div class="flex items-center space-x-4 text-nowrap mb-4">
                                        <x-checkbox id="{{ $id }}" wire:model="{{ $id }}" />
                                        <x-label for="{{ $id }}" value="{{ $label }}" class="dark:text-gray-300" />
                                    </div>
                                @endforeach
                            </div>
                        </div>             
                    </x-slot>

                    <x-slot name='actions'>
                        <x-button type='submit'>
                            Save
                        </x-button>
                    </x-slot>
                </x-form-section>
            </div>
        </div>
    </div>
</div>
