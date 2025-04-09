<x-form-section submit="send_email">
    <x-slot name="title">
        STUDENT PROFILE
    </x-slot>

    <x-slot name="description">
        Success is as dangerous as failure.
    </x-slot>

    <x-slot name="form" >
        <div class="col-span-6">
            <x-label for="name" value="Name" />
            <x-input wire:model='name' id="name" type="text" class="mt-1 block w-full" placeholder="Juan Dela Cruz" />
            <x-input-error for="name" />
        </div>

        <div class="col-span-6">
            <x-label for="student_no" value="Student #" />
            <x-input wire:model='student_no' id="student_no" type="text" class="mt-1 block w-full" placeholder="210100000 " />
            <x-input-error for="student_no" />
        </div>

        <div class="col-span-6">
            <x-label for="message" value="Message" />
            <textarea wire:model='message' id="message" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" rows="4" placeholder="Write your message..."></textarea>
            <x-input-error for="message" />
        </div>

        <div class="col-span-6">
            <x-label for="file" value="Attach Image" />
            <x-input wire:model='file' id="file" type="file" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
            <x-input-error for="file" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-button type="submit" class="px-4 py-2 bg-blue-600 rounded-md shadow hover:bg-blue-700 text-white">
            Send
        </x-button>
    </x-slot>
</x-form-section>
