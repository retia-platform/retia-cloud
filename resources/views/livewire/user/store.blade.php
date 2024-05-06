<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <x-form-section submit="store">
        <x-slot name="title">
            {{ __('Add New User') }}
        </x-slot>
        <x-slot name="description">
            {{ __('Input a new user data and information that you want to add to the system. Make sure you choose the right role for the user\'s access.') }}
        </x-slot>
        <x-slot name="form">
            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flex">
                    <x-icon type="user" class="w-4 h-4 mt-0.5 me-1" />
                    <x-label for="name" value="{{ __('Name') }}" />
                </div>
                <x-input id="name" autocomplete="name" type="text" placeholder="Ezra Lazuardy"
                    class="mt-1 block w-full text-sm" wire:model="name" />
                <span class="mt-2 text-xs"> The user's full name. </span>
                <x-input-error for="name" class="mt-2" />
            </div>
            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flex">
                    <x-icon type="at-symbol" class="w-4 h-4 mt-0.5 me-1" />
                    <x-label for="name" value="{{ __('Email') }}" />
                </div>
                <x-input id="name" autocomplete="email" type="email" placeholder="ezra@email.com"
                    class="mt-1 block w-full text-sm" wire:model="email" />
                <span class="mt-2 text-xs"> The user's email address. </span>
                <x-input-error for="email" class="mt-2" />
            </div>
            <!-- Role -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flex">
                    <x-icon type="key" class="w-4 h-4 mt-0.5 me-1" />
                    <x-label for="brand" value="{{ __('Role') }}" />
                </div>
                <div class="grid grid-cols-2 gap-6 mt-2">
                    <label
                        class="flex cursor-pointer items-start gap-4 rounded-lg border border-gray-200 p-4 transition hover:bg-gray-50 text-sm"
                        :for="$label">
                        <div class="flex items-center">
                            <input wire:model="filters.role"
                                class="size-4 mt-0.5 rounded-full text-gray-900 shadow-sm focus:ring-gray-600"
                                type="radio" value="technician" :id="$label" />
                        </div>
                        <div>
                            <strong class="font-medium text-md text-gray-900"> Technician </strong>
                            <p class="font-normal text-xs text-gray-700 mt-2"> Allow user to access only on some basic
                                features. </p>
                        </div>
                    </label>
                    <label
                        class="flex cursor-pointer items-start gap-4 rounded-lg border border-gray-200 p-4 transition hover:bg-gray-50 text-sm"
                        :for="$label">
                        <div class="flex items-center">
                            <input wire:model="filters.role"
                                class="size-4 mt-0.5 rounded-full text-gray-900 shadow-sm focus:ring-gray-600"
                                type="radio" value="administrator" :id="$label" />
                        </div>
                        <div>
                            <strong class="font-medium text-md text-gray-900"> Administrator </strong>
                            <p class="font-normal text-xs text-gray-700 mt-2"> Allow user to access all of the features.
                            </p>
                        </div>
                    </label>
                </div>
            </div>
            <!-- Alert -->
            <x-information-alert class="col-span-6 sm:col-span-4" title="Information"
                description="The account's password will be set to <b><code>password</code></b> by default. The user is highly recommended to change his own password after logging in to the system later." />
        </x-slot>
        <x-slot name="actions">
            <div class="me-4 text-sm" wire:loading>
                {{ __('Saving...') }}
            </div>
            <a href="{{ route('users') }}">
                <x-secondary-button class="me-4">
                    {{ __('Cancel') }}
                </x-secondary-button>
            </a>
            <x-button wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-form-section>
</div>
