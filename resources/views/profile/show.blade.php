<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        @can('update theme')
            <x-form-section submit="updateProfileInformation">
                <x-slot name="title">
                    {{ __('Theme') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Update your application theme color preferences.') }}
                </x-slot>

                <x-slot name="form">
                    <!-- Primary Color -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="primary_color" value="{{ __('Primary Color') }}" />
                        <div name="primary_color" class="flex mt-2">
                            <button type="button"
                                class="w-10 h-10 rounded-md transition-opacity opacity-100 hover:opacity-80 me-4 bg-white border-2 border-gray-400"
                                wire:click="updatePrimaryColorTheme('light')" />
                            <button type="button"
                                class="w-10 h-10 rounded-md transition-opacity opacity-100 hover:opacity-80 me-4 bg-gray-800"
                                wire:click="updatePrimaryColorTheme('light')" />
                        </div>
                    </div>

                    <!-- Accent Color -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="secondary_color" value="{{ __('Accent Color') }}" />
                        <div name="secondary_color" class="flex mt-2">
                            <button type="button"
                                class="w-10 h-10 rounded-md transition-opacity opacity-100 hover:opacity-80 me-4 bg-gray-800 border-2 border-gray-400"
                                wire:click="updateSecondaryColorTheme('black')" />
                            <button type="button"
                                class="w-10 h-10 rounded-md transition-opacity opacity-100 hover:opacity-80 me-4 bg-rose-400"
                                wire:click="updateSecondaryColorTheme('rose')" />
                            <button type="button"
                                class="w-10 h-10 rounded-md transition-opacity opacity-100 hover:opacity-80 me-4 bg-emerald-400"
                                wire:click="updateSecondaryColorTheme('emerald')" />
                            <button type="button"
                                class="w-10 h-10 rounded-md transition-opacity opacity-100 hover:opacity-80 me-4 bg-blue-400"
                                wire:click="updateSecondaryColorTheme('blue')" />
                            <button type="button"
                                class="w-10 h-10 rounded-md transition-opacity opacity-100 hover:opacity-80 me-4 bg-amber-400"
                                wire:click="updateSecondaryColorTheme('amber')" />
                            <button type="button"
                                class="w-10 h-10 rounded-md transition-opacity opacity-100 hover:opacity-80 me-4 bg-violet-400"
                                wire:click="updateSecondaryColorTheme('violet')" />
                        </div>
                    </div>
                </x-slot>

                <x-slot name="actions">
                    <x-button wire:loading.attr="disabled" wire:target="photo">
                        {{ __('Save') }}
                    </x-button>
                </x-slot>
            </x-form-section>

            <x-section-border />
        @endcan

        @can('update theme')
            <x-form-section submit="updateProfileInformation">
                <x-slot name="title">
                    {{ __('Localization') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Update your application language preferences.') }}
                </x-slot>

                <x-slot name="form">
                    <!-- Language -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="language" value="{{ __('Language') }}" />
                        <select wire:key="language-select" wire:change="$dispatch('update-language')" name="language"
                            id="language-select"
                            class="w-full rounded-lg border-gray-300 text-gray-700 text-md focus:ring-gray-600 focus:border-gray-600 mt-2">
                            <option value="english">English</option>
                        </select>
                    </div>
                </x-slot>

                <x-slot name="actions">
                    <x-button wire:loading.attr="disabled" wire:target="photo">
                        {{ __('Save') }}
                    </x-button>
                </x-slot>
            </x-form-section>

            <x-section-border />
        @endcan

        @can('update profile information')
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')
                <x-section-border />
            @endif
        @endcan

        @can('update password')
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>
                <x-section-border />
            @endif
        @endcan

        @can('manage two factor authentication')
            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>
                <x-section-border />
            @endif
        @endcan

        @can('manage session')
            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>
        @endcan

        @can('delete account')
            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        @endcan
    </div>
</x-app-layout>
