<div>
    <div class="flex gap-5 justify-end">
        {{-- School Year Dropdown --}}
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
    
                <x-dropdown-link wire:click="addSchoolYear" type="button">
                    ADD S.Y
                </x-dropdown-link>
            </x-slot>
        </x-dropdown>
    
        {{-- Strand Dropdown --}}
        <x-dropdown>
            <x-slot name="trigger">
                <x-secondary-button class="px-4 py-2 rounded flex items-center space-x-2">
                    <span>Strand</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </x-secondary-button>
            </x-slot>
        
            <x-slot name="content">
                @foreach ($strands as $strand)
                    <x-dropdown-link>
                        {{ $strand->strand }}
                    </x-dropdown-link>
                @endforeach

                <x-dropdown-link wire:click="addStrand" type="button">
                    ADD STRAND
                </x-dropdown-link>
            </x-slot>
        </x-dropdown>
    
        {{-- Section Dropdown --}}
        <x-dropdown>
            <x-slot name="trigger">
                <x-secondary-button class="px-4 py-2 rounded flex items-center space-x-2">
                    <span>Section</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </x-secondary-button>
            </x-slot>
        
            <x-slot name="content">
                @foreach ($sections as $section)
                    <x-dropdown-link>
                        {{ $section->section_number }}
                    </x-dropdown-link>
                @endforeach
    
                <x-dropdown-link wire:click="addSection">
                    ADD SECTION
                </x-dropdown-link>
            </x-slot>
        </x-dropdown>
    
        <x-button wire:click='addStudent'>
            Add Student
        </x-button>
    </div>

    <x-dialog-modal wire:model="addSchoolYearModal">
        <x-slot name="title">
            NEW SCHOOL YEAR

            <hr class="mt-1">
        </x-slot>

        <x-slot name="content">
            <div class="flex space-x-4">
                <div class="flex-1">
                    <x-label for="schoolYearStart" value="School year start" />
                    <x-input id="schoolYearStart" type="text" wire:model="schoolYearStart"  class="mt-1 block w-full" />
                    @error('schoolYearStart') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>
                
                <div class="flex-1">
                    <x-label for="schoolYearEnd" value="School year end" />
                    <x-input id="schoolYearEnd" type="text" wire:model="schoolYearEnd" class="mt-1 block w-full" />
                    @error('schoolYearEnd') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mt-2">
                <x-label for="classStart" value="Class Start" class="dark:text-white" />
                <x-input id="classStart" type="date" wire:model="classStart" class="mt-1 block w-full dark:bg-gray-800 dark:border-gray-600 dark:text-white" />
                @error('classStart') <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
            </div>
        </x-slot>        

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('addSchoolYearModal', false)">
                Dismiss
            </x-secondary-button>

            <x-button class="ml-2" wire:click="save('school_year')">
                Save
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model="addStrandModal">
        <x-slot name="title">
            NEW STRAND
            <hr class="mt-1 border-gray-300 dark:border-gray-600">
        </x-slot>
    
        <x-slot name="content">
            <div class="space-y-4">
                <div>
                    <x-label for="section_number" value="Section Number" class="dark:text-white" />
                    <x-input id="section_number" wire:model="sectionNumber" type="text" class="mt-1 block w-full dark:bg-gray-800 dark:border-gray-600 dark:text-white" />
                    @error('sectionNumber') <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                </div>
            </div>
        </x-slot>
    
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('addStrandModal', false)">
                Dismiss
            </x-secondary-button>
    
            <x-button class="ml-2" wire:click="save('section')">
                Save
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model="addSectionModal">
        <x-slot name="title">
            ADD SECTION
            <hr class="mt-1 border-gray-300 dark:border-gray-600">
        </x-slot>
    
        <x-slot name="content">
            <div class="space-y-4">
                <div>
                    <x-label for="section_number" value="Section Number" class="dark:text-white" />
                    <x-input id="section_number" wire:model="sectionNumber" type="text" class="mt-1 block w-full dark:bg-gray-800 dark:border-gray-600 dark:text-white" />
                    @error('sectionNumber') <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                </div>
    
                {{-- Preview --}}
                <div>
                    <x-label for="preview" value="Preview" class="dark:text-white" />
                    <x-input id="preview" type="text" class="mt-1 block w-full dark:bg-gray-800 dark:border-gray-600 dark:text-white" disabled />
                </div>
            </div>
        </x-slot>
    
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('addSectionModal', false)">
                Dismiss
            </x-secondary-button>
    
            <x-button class="ml-2" wire:click="save('section')">
                Save
            </x-button>
        </x-slot>
    </x-dialog-modal>
    
    <script>
        document.addEventListener('change', function () {
            const sectionNumberInput = document.getElementById('section_number');
            const previewInput = document.getElementById('preview');
            sectionNumberInput.addEventListener('change', updatePreview);
    
            function updatePreview() {
                const sectionNumber = 11 +sectionNumberInput.value;
    
                const previewText = `${sectionNumber ? sectionNumber : ''}`;
                previewInput.value = previewText.trim();
            }
        });
    </script>
</div>