<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-form-section submit="submitHandler">
            <x-slot name="title">
                STUDENT PROFILE
            </x-slot>
        
            <x-slot name="description">
                {{-- Success is as dangerous as failure. --}}
                Insert grade 11 student
            </x-slot>
        
            <x-slot name="form">
                <div class="col-span-6">
                    <div class="mb-4">
                        <h1 class="text-xl dark:text-white">Personal Information</h1>
                        <hr class="dark:border-gray-600">
                    </div>
        
                    <div class="flex gap-4">
                        <div class="w-1/2">
                            <x-label for="name" value="Name" />
                            <x-input wire:model="name" id="name" type="text" class="mt-1 block w-full" placeholder="Juan Dela Cruz" />
                            @error('name') <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                        </div>
                
                        <div class="w-1/2">
                            <x-label for="sex" value="Sex" />
                            <select wire:model="sex" id="sex"
                                class="mt-1 block w-full border-gray-300 rounded-md  dark:bg-gray-700 dark:text-white dark:border-gray-600">
                                <option value="" disabled selected>Select sex</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <x-input-error for="sex" class="mt-1" />
                        </div>                
                    </div>
                </div>
        
                <div class="col-span-6">
                    <div class="mb-4">
                        <h1 class="text-xl dark:text-white">Currrent School Information</h1>
                        <hr class="dark:border-gray-600">
                    </div>
        
                    <div class="flex gap-4">
                        <div class="w-1/2">
                            <x-label for="student_number" value="Student #" />
                            <x-input wire:model="student_number" id="student_number" type="text" class="mt-1 block w-full" placeholder="221000000" />
                            <x-input-error for="student_number" class="mt-1" />
                        </div>
                
                        <div class="w-1/2">
                            <x-label for="school_year" value="School Year" />
                            <select wire:model="school_year" id="school_year"
                                class="mt-1 block w-full border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600">
                                <option value="" disabled selected>Select school year</option>
                                @forelse ($school_years as $item)
                                    <option value="{{ $item->id }}">{{ $item->year_start }} - {{ $item->year_end }}</option>
                                @empty
                                    <option value="">No data availabe</option>
                                @endforelse
                            </select>
                            <x-input-error for="school_year" class="mt-1" />
                        </div>
                    </div>
                </div>
        
                <div class="col-span-6">
                    <div class="flex gap-4">
                        <div class="w-1/2">
                            <x-label for="strand" value="Strand" />
                            <select wire:model="strand" id="strand"
                                class="mt-1 block w-full border-gray-300 rounded-md  dark:bg-gray-700 dark:text-white dark:border-gray-600">
                                <option value="" disabled selected>Select strand</option>
                                @forelse ($strands as $item)
                                    <option value="{{ $item->id }}">{{ $item->strand }}</option>
                                @empty
                                    <option value="">No data available.</option>
                                @endforelse
                            </select>
                            <x-input-error for="strand" class="mt-1" />
                        </div>
                
                        <div class="w-1/2">
                            <x-label for="section" value="Section" />
                            <select wire:model="section" id="section"
                                class="mt-1 block w-full border-gray-300 rounded-md  dark:bg-gray-700 dark:text-white dark:border-gray-600">
                                <option value="" disabled selected>Select section</option>
                                @forelse ($sections as $item)
                                    <option value="{{ $item->id }}">{{ $item->section_name }}</option>
                                @empty
                                    <option value="">No data available.</option>
                                @endforelse
                            </select>
                            <x-input-error for="section" class="mt-1" />
                        </div>
                    </div>
                </div>
        
                <div class="col-span-6">
                    <div class="flex gap-4">
                        <div class="w-1/2">
                            <x-label for="category" value="Category" />
                            <select wire:model="category" id="category"
                                class="mt-1 block w-full border-gray-300 rounded-md  dark:bg-gray-700 dark:text-white dark:border-gray-600">
                                <option value="" disabled selected>Select category</option>
                                <option value="VPB">VPB</option>
                                <option value="Payee">Payee</option>
                                <option value="Pending">Pending</option>
                            </select>
                            <x-input-error for="category" class="mt-1" />
                        </div>
                
                        <div class="w-1/2">
                            <x-label for="billing_status" value="Billing Status" />
                            <select wire:model="billing_status" id="billing_status"
                                class="mt-1 block w-full border-gray-300 rounded-md  dark:bg-gray-700 dark:text-white dark:border-gray-600">
                                <option value="" disabled selected>Select billing status</option>
                                <option value="Billing">Billing</option>
                                <option value="Not billing">Not billing</option>
                            </select>
                            <x-input-error for="billing_status" class="mt-1" />
                        </div>
                    </div>
                </div>
        
                <div class="col-span-6">
                    <div class="flex gap-4">
                        <div class="w-1/2">
                            <x-label for="status" value="Status" />
                            <select wire:model="status" id="status"
                                class="mt-1 block w-full border-gray-300 rounded-md  dark:bg-gray-700 dark:text-white dark:border-gray-600">
                                <option value="" disabled selected>Select status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                            <x-input-error for="status" class="mt-1" />
                        </div>
                
                        <div class="w-1/2">
                            <x-label for="condition" value="Condition" />
                            <x-input wire:model="condition" id="condition" type="text" class="mt-1 block w-full" placeholder="4Ps" />
                            <x-input-error for="condition" class="mt-1" />
                        </div>
                    </div>
                </div>
        
                <div class="col-span-6">
                    <div class="mb-4">
                        <h1 class="text-xl dark:text-white">Additional Information</h1>
                        <hr class="dark:border-gray-600">
                    </div>
        
                    <div class="flex gap-4">
                        <div class="w-1/2">
                            <x-label for="lrn" value="LRN" />
                            <x-input wire:model="lrn" id="lrn" type="text" class="mt-1 block w-full" placeholder="1300000000000" />
                            <x-input-error for="lrn" class="mt-1" />
                        </div>
                
                        <div class="w-1/2">
                            <x-label for="school_origin" value="School Origin" />
                            <select wire:model="school_origin" id="school_origin"
                                class="mt-1 block w-full border-gray-300 rounded-md  dark:bg-gray-700 dark:text-white dark:border-gray-600">
                                <option value="" disabled selected>Select school origin</option>
                                <option value="Public">Public</option>
                                <option value="Private">Private</option>
                            </select>
                            <x-input-error for="school_origin" class="mt-1" />
                        </div>
                    </div>
                </div>
            </x-slot>
        
            <x-slot name="actions">
                <x-danger-button class="m-1">
                    Back
                </x-danger-button>
        
                <x-button type='submit' class="m-1">
                    Send
                </x-button>
            </x-slot>
        </x-form-section>
    </div>
</x-app-layout>