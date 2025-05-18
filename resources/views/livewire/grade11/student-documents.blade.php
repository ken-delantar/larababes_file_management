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
        <div class="flex-1 p-4 h-fit rounded bg-gray-50 dark:bg-gray-900">
            @forelse ($documents as $doc)
                @if ($doc->form_137)
                    <button wire:click="viewDocument({{ $doc->id }}, 'form_137')" type="button"
                        class="text-left w-full px-4 m-1 py-2 bg-gray-100 hover:bg-gray-200 rounded-md font-semibold shadow transition">
                        Form 137
                    </button>
                @endif
                
                @if ($doc->form_138)
                    <button wire:click="viewDocument({{ $doc->id }}, 'form_138')" type="button"
                        class="text-left w-full px-4 m-1 py-2 bg-gray-100 hover:bg-gray-200 rounded-md font-semibold shadow transition">
                        Form 138
                    </button>
                @endif
                
                @if ($doc->good_moral)
                    <button wire:click="viewDocument({{ $doc->id }}, 'good_moral')" type="button"
                        class="text-left w-full px-4 m-1 py-2 bg-gray-100 hover:bg-gray-200 rounded-md font-semibold shadow transition">
                        Good Moral
                    </button>
                @endif
                
                @if ($doc->psa)
                    <button wire:click="viewDocument({{ $doc->id }}, 'psa')" type="button"
                        class="text-left w-full px-4 m-1 py-2 bg-gray-100 hover:bg-gray-200 rounded-md font-semibold shadow transition">
                        PSA
                    </button>
                @endif
                
                @if ($doc->pic)
                    <button wire:click="viewDocument({{ $doc->id }}, 'pic')" type="button"
                        class="text-left w-full px-4 m-1 py-2 bg-gray-100 hover:bg-gray-200 rounded-md font-semibold shadow transition">
                        Picture
                    </button>
                @endif
                
                @if ($doc->esc_certificate)
                    <button wire:click="viewDocument({{ $doc->id }}, 'esc_certificate')" type="button"
                        class="text-left w-full px-4 m-1 py-2 bg-gray-100 hover:bg-gray-200 rounded-md font-semibold shadow transition">
                        ESC Certificate
                    </button>
                @endif
                
                @if ($doc->diploma)
                    <button wire:click="viewDocument({{ $doc->id }}, 'diploma')" type="button"
                        class="text-left w-full px-4 m-1 py-2 bg-gray-100 hover:bg-gray-200 rounded-md font-semibold shadow transition">
                        Diploma
                    </button>
                @endif
                
                @if ($doc->brgy_certificate)
                    <button wire:click="viewDocument({{ $doc->id }}, 'brgy_certificate')" type="button"
                        class="text-left w-full px-4 m-1 py-2 bg-gray-100 hover:bg-gray-200 rounded-md font-semibold shadow transition">
                        Barangay Certificate
                    </button>
                @endif
                
                @if ($doc->ncae)
                    <button wire:click="viewDocument({{ $doc->id }}, 'ncae')" type="button"
                        class="text-left w-full px-4 m-1 py-2 bg-gray-100 hover:bg-gray-200 rounded-md font-semibold shadow transition">
                        NCAE
                    </button>
                @endif
                
                @if ($doc->af_five)
                    <button wire:click="viewDocument({{ $doc->id }}, 'af_five')" type="button"
                        class="text-left w-full px-4 m-1 py-2 bg-gray-100 hover:bg-gray-200 rounded-md font-semibold shadow transition">
                        AF-5
                    </button>
                @endif        
            @empty
                <p class="text-gray-500 italic">No documents found.</p>
            @endforelse
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
                <form wire:submit='uploadFile' enctype="multipart/form-data">
                    <div class="mb-3 px-3">
                        <x-label for='file_upload' value='Note: uploading multiple documents at once is supported. File name must be one of the following: form_137, form_138, good_moral, psa, pic, esc_certificate, diploma, brgy_certificate, ncae, af_five' />
                    </div>
    
                    <div class="flex items-center gap-4 pr-12">
                        <input 
                            type="file" 
                            id="file_upload" 
                            wire:model="file_uploads" 
                            multiple
                            accept="application/pdf" 
                            class="w-full text-sm text-gray-500 dark:text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 dark:file:bg-blue-900 file:text-blue-700 dark:file:text-blue-300 hover:file:bg-blue-100 dark:hover:file:bg-blue-800"
                        />
    
                        <x-secondary-button type='submit'>
                            Upload
                        </x-secondary-button>
                    </div>
                    <x-action-message on="fileUploded" class="mt-3">
                        Uploaded.
                    </x-action-message>
                    @error('file_uploads')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                    
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
        </div>
    </div>

    <x-dialog-modal wire:model="viewDocumentModal">
        <x-slot name="title">

        </x-slot>
    
        <x-slot name="content">
            <div class="space-y-4">
                <div>
                    @if ($file_id && $field)
                        @if (Str::startsWith($fileMimeType, 'image/'))
                            <img src="{{ route('document.view', ['id' => $file_id, 'field' => $field]) }}"
                                alt="Document Image"
                                class="w-full max-h-[700px] object-contain rounded border border-gray-300 shadow" />
                        @else
                            <iframe src="{{ route('document.view', ['id' => $file_id, 'field' => $field]) }}"
                                class="w-full h-[700px] rounded border border-gray-300 shadow"></iframe>
                        @endif
                    @else
                        <p class="text-sm text-gray-400 italic">No document selected.</p>
                    @endif
                </div>
            </div>
        </x-slot>
    
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('viewDocumentModal', false)">
                Dismiss
            </x-secondary-button>
        </x-slot>
    
        <style>
            [x-cloak] + div > div > div {
                max-width: 90vw !important;
                width: 90vw !important;
            }
        </style>
    </x-dialog-modal>  
</div>
