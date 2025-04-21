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
        </x-slot>
    </x-section-title>

    <div class="flex flex-col md:flex-row gap-4 mt-4">
        <div class="flex-1 p-4 rounded bg-gray-50 dark:bg-gray-900">

            @forelse ($documents as $doc)
                <div x-data="{ openForm137: false, openForm138: false, openGoodMoral: false, openPsa: false, openPic: false, openEsc: false, openDiploma: false, openBrgy: false, openNcae: false, openAfFive: false }">
                    @if ($doc->form_137)
                        <div>
                            <button @click="openForm137 = !openForm137"
                                class="text-left w-full px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-md font-semibold shadow transition">
                                FORM 137
                            </button>
                            <div x-show="openForm137" x-transition class="mt-2">
                                <iframe src="{{ route('document.view', ['id' => $doc->id, 'field' => 'form_137']) }}"
                                    class="w-full h-[400px] rounded border border-gray-300 shadow"></iframe>
                            </div>
                        </div>
                    @endif
                
                    @if ($doc->form_138)
                        <div class="mt-4">
                            <button @click="openForm138 = !openForm138"
                                class="text-left w-full px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-md font-semibold shadow transition">
                                FORM 138
                            </button>
                            <div x-show="openForm138" x-transition class="mt-2">
                                <iframe src="{{ route('document.view', ['id' => $doc->id, 'field' => 'form_138']) }}"
                                    class="w-full h-[400px] rounded border border-gray-300 shadow"></iframe>
                            </div>
                        </div>
                    @endif
                
                    @if ($doc->good_moral)
                        <div class="mt-4">
                            <button @click="openGoodMoral = !openGoodMoral"
                                class="text-left w-full px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-md font-semibold shadow transition">
                                Good Moral
                            </button>
                            <div x-show="openGoodMoral" x-transition class="mt-2">
                                <iframe src="{{ route('document.view', ['id' => $doc->id, 'field' => 'good_moral']) }}"
                                    class="w-full h-[400px] rounded border border-gray-300 shadow"></iframe>
                            </div>
                        </div>
                    @endif
                
                    @if ($doc->psa)
                        <div class="mt-4">
                            <button @click="openPsa = !openPsa"
                                class="text-left w-full px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-md font-semibold shadow transition">
                                PSA
                            </button>
                            <div x-show="openPsa" x-transition class="mt-2">
                                <iframe src="{{ route('document.view', ['id' => $doc->id, 'field' => 'psa']) }}"
                                    class="w-full h-[400px] rounded border border-gray-300 shadow"></iframe>
                            </div>
                        </div>
                    @endif
                
                    @if ($doc->pic)
                        <div class="mt-4">
                            <button @click="openPic = !openPic"
                                class="text-left w-full px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-md font-semibold shadow transition">
                                2x2 Picture
                            </button>
                            <div x-show="openPic" x-transition class="mt-2">
                                <iframe src="{{ route('document.view', ['id' => $doc->id, 'field' => 'pic']) }}"
                                    class="w-full h-[400px] rounded border border-gray-300 shadow"></iframe>
                            </div>
                        </div>
                    @endif
                
                    @if ($doc->esc_certificate)
                        <div class="mt-4">
                            <button @click="openEsc = !openEsc"
                                class="text-left w-full px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-md font-semibold shadow transition">
                                ESC Certificate
                            </button>
                            <div x-show="openEsc" x-transition class="mt-2">
                                <iframe src="{{ route('document.view', ['id' => $doc->id, 'field' => 'esc_certificate']) }}"
                                    class="w-full h-[400px] rounded border border-gray-300 shadow"></iframe>
                            </div>
                        </div>
                    @endif
                
                    @if ($doc->diploma)
                        <div class="mt-4">
                            <button @click="openDiploma = !openDiploma"
                                class="text-left w-full px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-md font-semibold shadow transition">
                                Diploma
                            </button>
                            <div x-show="openDiploma" x-transition class="mt-2">
                                <iframe src="{{ route('document.view', ['id' => $doc->id, 'field' => 'diploma']) }}"
                                    class="w-full h-[400px] rounded border border-gray-300 shadow"></iframe>
                            </div>
                        </div>
                    @endif
                
                    @if ($doc->brgy_certificate)
                        <div class="mt-4">
                            <button @click="openBrgy = !openBrgy"
                                class="text-left w-full px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-md font-semibold shadow transition">
                                Brgy. Certificate
                            </button>
                            <div x-show="openBrgy" x-transition class="mt-2">
                                <iframe src="{{ route('document.view', ['id' => $doc->id, 'field' => 'brgy_certificate']) }}"
                                    class="w-full h-[400px] rounded border border-gray-300 shadow"></iframe>
                            </div>
                        </div>
                    @endif
                
                    @if ($doc->ncae)
                        <div class="mt-4">
                            <button @click="openNcae = !openNcae"
                                class="text-left w-full px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-md font-semibold shadow transition">
                                NCAE
                            </button>
                            <div x-show="openNcae" x-transition class="mt-2">
                                <iframe src="{{ route('document.view', ['id' => $doc->id, 'field' => 'ncae']) }}"
                                    class="w-full h-[400px] rounded border border-gray-300 shadow"></iframe>
                            </div>
                        </div>
                    @endif
                
                    @if ($doc->af_five)
                        <div class="mt-4">
                            <button @click="openAfFive = !openAfFive"
                                class="text-left w-full px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-md font-semibold shadow transition">
                                AF-5
                            </button>
                            <div x-show="openAfFive" x-transition class="mt-2">
                                <iframe src="{{ route('document.view', ['id' => $doc->id, 'field' => 'af_five']) }}"
                                    class="w-full h-[400px] rounded border border-gray-300 shadow"></iframe>
                            </div>
                        </div>
                    @endif
                </div>
            @empty
                <p class="text-gray-500 italic">No documents found.</p>
            @endforelse
        
            {{-- @if ($documents)
                <div class="mt-8">
                    {{ $documents->links() }}
                </div>
            @endif --}}

            <form wire:submit='uploadFile' class="mt-5">
                <div class="mb-3 px-3">
                    <x-label for='file_upload' value='Note: uploading multiple documents at once is supported. File name must be one of the following: form_137, form_138, good_moral, psa, pic, esc_certificate, diploma, brgy_certificate, ncae, af_five' />
                </div>

                <div class="flex items-center gap-4 pr-12">
                    <input 
                        type="file" 
                        id="file_upload" 
                        wire:model="file_uploads" 
                        multiple
                        accept="application/pdf, image/jpeg, image/jpg, image/png" 
                        class="w-full text-sm text-gray-500 dark:text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 dark:file:bg-blue-900 file:text-blue-700 dark:file:text-blue-300 hover:file:bg-blue-100 dark:hover:file:bg-blue-800"
                    />

                    <x-secondary-button type='submit'>
                        Upload
                    </x-secondary-button>
                </div>
                <x-action-message on="fileUploded" class="mt-3">
                    Uploaded.
                </x-action-message>
                @error('file_upload')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                
                <div class="mt-3">
                    @if (session()->has('message'))
                        <div class="px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Notice: </strong>
                            <span class="block sm:inline">{{ session('message') }}</span>
                        </div>
                    @endif
                </div>
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
                <x-form-section submit='checklist'>
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
                                        @if ($checklistData[$id])
                                            <x-checkbox id="{{ $id }}" wire:model="checklistData.{{ $id }}" checked />
                                        @else
                                            <x-checkbox id="{{ $id }}" wire:model="checklistData.{{ $id }}" />
                                        @endif
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
                                        @if ($checklistData[$id])
                                            <x-checkbox id="{{ $id }}" wire:model="checklistData.{{ $id }}" checked />
                                        @else
                                            <x-checkbox id="{{ $id }}" wire:model="checklistData.{{ $id }}" />
                                        @endif
                                        <x-label for="{{ $id }}" value="{{ $label }}" class="dark:text-gray-300" />
                                    </div>
                                @endforeach
                            </div>             
                        </div>             
                    </x-slot>

                    <x-slot name='actions'>
                        <x-action-message on="checklistUpdated" class="mr-5">
                            Saved.
                        </x-action-message>

                        <x-button type='submit'>
                            Save
                        </x-button>
                    </x-slot>
                </x-form-section>
            </div>
        </div>
    </div>
</div>
