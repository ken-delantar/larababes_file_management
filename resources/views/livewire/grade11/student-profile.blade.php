<form wire:submit.prevent="updateAllStudentInformation" class="bg-white rounded shadow max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-12">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        {{-- Left Column --}}
        <div class="space-y-12 px-6">
            {{-- Personal Information --}}
            <div>
                <x-section-title title="Personal Information" description="This section contains the student's basic personal details, including full name, gender, and email." />

                <div class="grid grid-cols-1 gap-6 mt-6 px-12">
                    <div class="col-span-1 sm:col-span-4">
                        <x-label for="name" value="Name" />
                        <x-input id="name" type="text" class="mt-1 block w-full" wire:model="name" />
                        <x-input-error for="name" class="mt-2" />
                    </div>

                    <div class="col-span-1 sm:col-span-4">
                        <x-label for="email" value="Email" />
                        <x-input id="email" type="email" class="mt-1 block w-full" wire:model="email" />
                        <x-input-error for="email" class="mt-2" />
                    </div>

                    <div class="col-span-1 sm:col-span-4">
                        <x-label for="gender" value="Gender" class="dark:text-white" />
                        <select id="gender" wire:model="gender" class="mt-1 block w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:ring focus:ring-indigo-200">
                            <option value="Male" {{ $sex === 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $sex === 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                        @error('gender') <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <hr>

            {{-- SHS Information --}}
            <div>
                <x-section-title title="SHS Information" description="Academic records including strand, section, and school year." />

                <div class="grid grid-cols-1 gap-6 mt-6 px-12">
                    <div class="col-span-1 sm:col-span-4">
                        <x-label for="student_id" value="Student #" />
                        <x-input id="student_id" type="text" class="mt-1 block w-full" wire:model="student_id" />
                        <x-input-error for="student_id" class="mt-2" />
                    </div>

                    <div class="col-span-1">
                        <x-label value='Grade 11' />
                        <hr class="my-2">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            {{-- School Year --}}
                            <div>
                                <x-label for="school_year_11" value="School Year" />
                                <select id="school_year_11" wire:model="school_year_11" class="form-select mt-1 block w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:ring focus:ring-indigo-200">
                                    @foreach ($school_years as $school_year)
                                        <option value="{{ $school_year->id }}">{{ $school_year->school_year }}</option>
                                    @endforeach
                                </select>
                                <x-input-error for="school_year_11" class="mt-2" />
                            </div>
                        
                            {{-- Strand --}}
                            <div>
                                <x-label for="strand_11" value="Strand" />
                                <select id="strand_11" wire:model="strand_11" class="form-select mt-1 block w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:ring focus:ring-indigo-200">
                                    @foreach ($strands as $strand)
                                        <option value="{{ $strand->id }}">{{ $strand->strand }}</option>
                                    @endforeach
                                </select>
                                <x-input-error for="strand_11" class="mt-2" />
                            </div>
                        
                            {{-- Section --}}
                            <div>
                                <x-label for="section_11" value="Section" />
                                <select id="section_11" wire:model="section_11" class="form-select mt-1 block w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:ring focus:ring-indigo-200">
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->section_number }}</option>
                                    @endforeach
                                </select>
                                <x-input-error for="section_11" class="mt-2" />
                            </div>
                        
                            {{-- Year End Status --}}
                            <div>
                                <x-label for="year_end_status_11" value="Year End Status" />
                                <select id="year_end_status_11" wire:model="year_end_status_11" class="form-select mt-1 block w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:ring focus:ring-indigo-200">
                                    <option value="{{ $year_end_status_11 }}">{{ $year_end_status_11 }}</option>
                                </select>
                                <x-input-error for="year_end_status_11" class="mt-2" />
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        {{-- Right Column --}}
        <div class="space-y-12 px-6">
            {{-- Financial Records --}}
            <div>
                <x-section-title title="Financial Records" description="Student’s billing, category, and voucher info." />
            
                <div class="grid grid-cols-1 gap-6 mt-6 px-12">
                    <div class="col-span-1 sm:col-span-4">
                        <x-label for="category" value="Category" />
                        @if ($category)
                            <x-input id="category" type="text" class="mt-1 block w-full" wire:model="category" readonly />
                            <x-input-error for="category" class="mt-2" />
                        @else
                            <p>No data.</p>
                        @endif
                    </div>
            
                    <div class="col-span-1 sm:col-span-4">
                        <x-label for="billing_status" value="Billing Status" />
                        @if ($billing_status)
                            <x-input id="billing_status" type="text" class="mt-1 block w-full" wire:model="billing_status" readonly />
                            <x-input-error for="billing_status" class="mt-2" />
                        @else
                            <p>No data.</p>
                        @endif
                    </div>
            
                    <div class="col-span-1 sm:col-span-4">
                        @if ($vms_billing_status)
                            <x-label for="vms_billing_status" value="VMS Billing Status" />
                            <x-input id="vms_billing_status" type="text" class="mt-1 block w-full" wire:model="vms_billing_status" readonly />
                            <x-input-error for="vms_billing_status" class="mt-2" />
                        @else
                            <p>No data.</p>
                        @endif
                    </div>
            
                    <div class="col-span-1 sm:col-span-4">
                        <x-label for="approved_voucher" value="Approved Voucher" />
                        @if ($approved_voucher)
                            <x-input id="approved_voucher" type="text" class="mt-1 block w-full" wire:model="approved_voucher" readonly />
                            <x-input-error for="approved_voucher" class="mt-2" />
                        @else
                            <p>No data.</p>
                        @endif
                    </div>
            
                    <div class="col-span-1 sm:col-span-4">
                        <x-label for="payee_fee" value="Payee Fee" />
                        @if ($payee_fee)
                            <x-input id="payee_fee" type="text" class="mt-1 block w-full" wire:model="payee_fee" readonly />
                            <x-input-error for="payee_fee" class="mt-2" />
                        @else
                            <p>No data.</p>
                        @endif
                    </div>
                </div>
            </div>
            

            <hr>

            {{-- Additional Information --}}
            <div>
                <x-section-title title="Additional Information" description="Previous school details before SHS." />

                <div class="grid grid-cols-1 gap-6 mt-6 px-12">
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="lrn" value="LRN" />
                        <x-input id="lrn" type="text" class="mt-1 block w-full" wire:model="lrn" />
                        <x-input-error for="lrn" class="mt-2" />
                    </div>

                    <div class="col-span-1 sm:col-span-4">
                        <x-label for="school_origin" value="School origin" />
                        <x-input id="school_origin" type="text" class="mt-1 block w-full" wire:model="school_origin" />
                        <x-input-error for="school_origin" class="mt-2" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Global Submit --}}
    <div class="flex justify-end mt-10">
        <x-action-message class="me-3" on="saved">
            {{ __('Updated.') }}
        </x-action-message>

        <x-button type="submit">
            {{ __('Update All') }}
        </x-button>
    </div>
</form>
