<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Update Account Information -->
    <x-form-section submit="update">
        <x-slot name="title">
            {{ __('Update User Information') }}
        </x-slot>
        <x-slot name="description">
            {{ __('Update the user account data and information. Make sure you choose the right role for the user\'s access.') }}
        </x-slot>
        <x-slot name="form">
            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flex">
                    <x-icon type="user" class="w-4 h-4 mt-0.5 me-1" />
                    <x-label for="name" value="{{ __('Name') }}" />
                </div>
                <x-input id="name" autocomplete="name" type="text" placeholder="Ezra Lazuardy"
                    class="mt-1 block w-full text-sm" wire:model="user.name" />
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
                    class="mt-1 block w-full text-sm" wire:model="user.email" />
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
                            <input wire:model="role"
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
                            <input wire:model="role"
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
            <x-warning-alert class="col-span-6 sm:col-span-4" title="Warning"
                description="Updating user's account email address would make the user can't login to the system using their old email address. User will be notified for this action. Proceed with caution." />
        </x-slot>
        <x-slot name="actions">
            <div class="me-4 text-sm" wire:loading>
                {{ __('Updating...') }}
            </div>
            <x-button wire:loading.attr="disabled">
                {{ __('Update') }}
            </x-button>
        </x-slot>
    </x-form-section>

    <x-section-border />

    <!-- Update Account Password -->
    <x-form-section submit="updatePassword">
        <x-slot name="title">
            {{ __('Update Account Password') }}
        </x-slot>
        <x-slot name="description">
            {{ __('Force update the user\'s account password.') }}
        </x-slot>
        <x-slot name="form">
            <!-- Password -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flex">
                    <x-icon type="fingerprint" class="w-4 h-4 mt-0.5 me-1" />
                    <x-label for="name" value="{{ __('New Password') }}" />
                </div>
                <x-input id="password" autocomplete="password" type="password" placeholder="••••••••"
                    class="mt-1 block w-full text-sm" wire:model="password" />
                <span class="mt-2 text-xs"> The user's new account password. </span>
                <x-input-error for="password" class="mt-2" />
            </div>
            <!-- Password Confirmation -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flex">
                    <x-icon type="fingerprint" class="w-4 h-4 mt-0.5 me-1" />
                    <x-label for="name" value="{{ __('Confirm New Password') }}" />
                </div>
                <x-input id="password_confirmation" autocomplete="password_confirmation" type="password"
                    placeholder="••••••••" class="mt-1 block w-full text-sm" />
                <span class="mt-2 text-xs"> Re-type the new account password. </span>
                <x-input-error for="password_confirmation" class="mt-2" />
            </div>
            <!-- Alert -->
            <x-warning-alert class="col-span-6 sm:col-span-4" title="Warning"
                description="Updating user's account password would make the user can't login to the system using their old password. User will be notified for this action. Proceed with caution." />
        </x-slot>
        <x-slot name="actions">
            <div class="me-4 text-sm" wire:loading>
                {{ __('Updating...') }}
            </div>
            <x-button wire:loading.attr="disabled">
                {{ __('Update') }}
            </x-button>
        </x-slot>
    </x-form-section>

    <x-section-border />

    <!-- Button -->
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="mt-5"></div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div
                class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-gray-800 text-end sm:px-6 shadow rounded-md">
                <a href="{{ route('users') }}">
                    <x-secondary-button>
                        {{ __('Cancel') }}
                    </x-secondary-button>
                </a>
            </div>
        </div>
    </div>
</div>
