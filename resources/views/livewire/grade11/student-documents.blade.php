<div class="bg-white max-w-7xl mx-auto sm:px-6 lg:px-12 py-12 rounded shadow">
    <x-section-title>
        <x-slot name='title'>
            Student Documents
        </x-slot>

        <x-slot name='description'>
            Upload and preview student-related documents such as PDFs or images.
        </x-slot>

        <x-slot name='aside'>
            <x-secondary-button wire:click='back'>
                Back
            </x-secondary-button>
            <x-button wire:click='save'>
                Information
            </x-button>
        </x-slot>
    </x-section-title>

    <div class="flex flex-col md:flex-row gap-4 mt-4">
        <div class="flex-1 p-4 rounded">
            <div class="space-y-8 h-96 pr-3">
                @foreach ($documents as $doc)
                    <div>
                        <iframe src="{{ route('document.view', $doc->id) }}" class="w-full h-[400px] border-1"></iframe>
                    </div>
                @endforeach
            </div>

            {{-- <div class="text-center py-8">
                    <img src="https://cdn-icons-png.flaticon.com/512/833/833281.png" alt="No documents uploaded" class="mx-auto w-32 h-32 opacity-50 mb-4" />
                    <p class="text-gray-500">No documents uploaded yet.</p>
                </div> --}}

            <div class="mt-8">
                {{ $documents->links() }}
            </div>

            <form class="mt-5">
                <div class="flex items-center gap-4 pr-12">
                    <input type="file" wire:model="file" accept="application/pdf, image/jpeg, image/jpg, image/png" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold  file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />

                    <x-secondary-button type="submit">
                        Upload
                    </x-secondary-button>
                </div>
            </form>
        </div>

        <div class="flex-1 p-4 rounded">
            <div class="w-full mb-5">
                <x-label for='student_id' value='Student #' />
                <x-input id="student_id" wire:model='student_id' class="w-full" />
            </div>
            
            <div class="w-full mb-5">
                <x-label for='name' value='Name' />
                <x-input id="name" wire:model='name' class="w-full" />
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
                        <div class="flex gap-4">
                            <div class="flex-1">
                                <div class="flex items-center space-x-4 text-nowrap mb-4">
                                    <x-checkbox id="form_137" wire:model='form_137' />
                                    <x-label for='form_137' value='Form 137' />
                                </div>
                            
                                <div class="flex items-center space-x-4 text-nowrap mb-4">
                                    <x-checkbox id="form_138" wire:model='form_138' />
                                    <x-label for='form_138' value='Form 138' />
                                </div>
                            
                                <div class="flex items-center space-x-4 text-nowrap mb-4">
                                    <x-checkbox id="good_moral" wire:model='good_moral' />
                                    <x-label for='good_moral' value='Good Moral' />
                                </div>

                                <div class="flex items-center space-x-4 text-nowrap mb-4">
                                    <x-checkbox id="psa" wire:model='psa' />
                                    <x-label for='psa' value='PSA' />
                                </div>

                                <div class="flex items-center space-x-4 text-nowrap mb-4">
                                    <x-checkbox id="pic" wire:model='pic' />
                                    <x-label for='pic' value='2x2' />
                                </div>
                            </div>
                            
                            <div class="flex-1 pl-12">
                                <div class="flex items-center space-x-4 text-nowrap mb-4">
                                    <x-checkbox id="esc_certificate" wire:model='esc_certificate' />
                                    <x-label for='esc_certificate' value='ESC Certificate' />
                                </div>
                            
                                <div class="flex items-center space-x-4 text-nowrap mb-4">
                                    <x-checkbox id="diploma" wire:model='diploma' />
                                    <x-label for='diploma' value='Diploma' />
                                </div>
                            
                                <div class="flex items-center space-x-4 text-nowrap mb-4">
                                    <x-checkbox id="brgy_certificate" wire:model='brgy_certificate' />
                                    <x-label for='brgy_certificate' value='Brgy. Certificate' />
                                </div>

                                <div class="flex items-center space-x-4 text-nowrap mb-4">
                                    <x-checkbox id="ncae" wire:model='ncae' />
                                    <x-label for='ncae' value='NCAE' />
                                </div>

                                <div class="flex items-center space-x-4 text-nowrap mb-4">
                                    <x-checkbox id="af_five" wire:model='af_five' />
                                    <x-label for='af_five' value='AF-5' />
                                </div>
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
