<div>
    <!-- resources/views/livewire/grade11/school-year-modal.blade.php -->
    <div class="flex gap-5 justify-end">
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
                <x-dropdown-link wire:click="$set('schoolYear', '2024 - 2025')">
                    2024 - 2025
                </x-dropdown-link>

                <x-dropdown-link wire:click="$set('schoolYear', '2023 - 2024')">
                    2023 - 2024
                </x-dropdown-link>

                <x-dropdown-link wire:click="addSchoolYear">
                    Add S.Y
                </x-dropdown-link>
                
            </x-slot>
        </x-dropdown> 

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
                    <x-dropdown-link wire:click="$set('schoolYear', '2024 - 2025')">
                        {{ $strand->strand }}
                    </x-dropdown-link>
                @endforeach
                

                {{-- <x-dropdown-link wire:click="$set('schoolYear', '2023 - 2024')">
                    ABM
                </x-dropdown-link>

                <x-dropdown-link wire:click="$set('schoolYear', '2023 - 2024')">
                    STEM
                </x-dropdown-link>

                <x-dropdown-link wire:click="$set('schoolYear', '2023 - 2024')">
                    HUMMS
                </x-dropdown-link> --}}
            </x-slot>
        </x-dropdown> 

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
                <x-dropdown-link wire:click="addSection">
                    Add Section
                </x-dropdown-link>
            </x-slot>
        </x-dropdown> 

        <x-button>
            Add Student
        </x-button>
    </div>

    <x-dialog-modal wire:model="addSchoolYearModal">
        <x-slot name="title">
            Add School Year

            <hr class="mt-1">
        </x-slot>

        <x-slot name="content">
            <div class="flex space-x-4">
                <div class="flex-1">
                    <x-label for="schoolYearStart" value="School year start" />
                    <x-input id="schoolYearStart" type="text" class="mt-1 block w-full" wire:model.defer="schoolYearStart" />
                    @error('schoolYearStart') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>
                
                <div class="flex-1">
                    <x-label for="schoolYearEnd" value="School year end" />
                    <x-input id="schoolYearEnd" type="text" class="mt-1 block w-full" wire:model.defer="schoolYearEnd" />
                    @error('schoolYearEnd') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>
            </div>
        </x-slot>        

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('addSchoolYearModal', false)">
                Dismiss
            </x-secondary-button>

            <x-button class="ml-2" wire:click="save">
                Save
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal wire:model="addSectionModal">
        <x-slot name="title">
            Add Section
            <hr class="mt-1 border-gray-300 dark:border-gray-600">
        </x-slot>
    
        <x-slot name="content">
            <div class="space-y-4">
                {{-- School Year --}}
                <div>
                    <x-label for="schoolYear" value="School Year" class="dark:text-white" />
                    <select name="schoolYear" id="schoolYear"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:ring focus:ring-indigo-200">
                        <option value="">2024 - 2025</option>
                        <option value="">2023 - 2024</option>
                        <option value="">2022 - 2023</option>
                    </select>
                    @error('schoolYear') <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                </div>
    
                {{-- Strand --}}
                <div>
                    <x-label for="strand" value="Strand" class="dark:text-white" />
                    <select name="strand" id="strand"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:ring focus:ring-indigo-200">
                        <option value="">ICT</option>
                        <option value="">STEM</option>
                        <option value="">ABM</option>
                        <option value="">HUMMS</option>
                    </select>
                    @error('strand') <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                </div>
    
                {{-- Section Number --}}
                <div>
                    <x-label for="section_number" value="Section Number" class="dark:text-white" />
                    <x-input id="section_number" type="text" class="mt-1 block w-full dark:bg-gray-800 dark:border-gray-600 dark:text-white" wire:model.defer="section_number" />
                    @error('section_number') <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                </div>
    
                {{-- Preview --}}
                <div>
                    <x-label for="preview" value="Preview" class="dark:text-white" />
                    <x-input id="preview" type="text" class="mt-1 block w-full dark:bg-gray-800 dark:border-gray-600 dark:text-white" wire:model.defer="preview" />
                    @error('preview') <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                </div>
            </div>
        </x-slot>
    
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('addSectionModal', false)">
                Dismiss
            </x-secondary-button>
    
            <x-button class="ml-2" wire:click="save">
                Save
            </x-button>
        </x-slot>
    </x-dialog-modal>
    
    
</div>