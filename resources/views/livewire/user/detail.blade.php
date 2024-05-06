<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <x-form-section submit="update">
        <x-slot name="title">
            {{ __('User Information') }}
        </x-slot>
        <x-slot name="description">
            {{ __('See the information detail about the user.') }}
        </x-slot>
        <x-slot name="form">
            <!-- Photo -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flex">
                    <x-label for="name" value="{{ __('Photo') }}" />
                </div>
                <img src="{{ $user->profilePhotoUrl }}" alt="'.$user->name.'"
                    class="h-20 w-20 mt-4 rounded-full object-cover" />
            </div>
            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flex">
                    <x-label for="name" value="{{ __('Name') }}" />
                </div>
                <x-input id="name" autocomplete="name" type="text" value="{{ $user->name }}"
                    class="mt-1 block w-full text-sm disabled:shadow-none" disabled />
            </div>
            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flex">
                    <x-label for="name" value="{{ __('Email') }}" />
                </div>
                <x-input id="name" autocomplete="email" type="email" value="{{ $user->email }}"
                    class="mt-1 block w-full text-sm disabled:shadow-none" disabled />
            </div>
            <!-- Created At -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flex">
                    <x-label for="name" value="{{ __('Created At') }}" />
                </div>
                <x-input id="created_at" autocomplete="created_at" type="text"
                    value="{{ $user->created_at->diffForHumans() }}"
                    class="mt-1 block w-full text-sm disabled:shadow-none" disabled />
            </div>
            <!-- Updated At -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flex">
                    <x-label for="name" value="{{ __('Updated At') }}" />
                </div>
                <x-input id="updated_at" autocomplete="updated_at" type="text"
                    value="{{ $user->updated_at->diffForHumans() }}"
                    class="mt-1 block w-full text-sm disabled:shadow-none" disabled />
            </div>
            <!-- Role -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flex">
                    <x-label for="brand" value="{{ __('Role') }}" />
                </div>
                <div class="grid grid-cols-1 mt-2">
                    <label class="flex items-start gap-4 rounded-lg border border-gray-200 p-4 text-sm"
                        :for="$label">
                        <div>
                            <strong class="font-bold text-md text-gray-900"> {{ $user->role->name }} </strong>
                            <p class="font-medium text-sm text-gray-700 mt-2">
                                @switch($user->role->name)
                                    @case('Administrator')
                                        This user has access to all of the features.
                                    @break

                                    @default
                                        This user has access to only on some basic features.
                                @endswitch
                            </p>
                        </div>
                    </label>
                </div>
            </div>
        </x-slot>
        <x-slot name="actions">
            <a href="{{ route('users') }}">
                <x-secondary-button>
                    {{ __('Back') }}
                </x-secondary-button>
            </a>
        </x-slot>
    </x-form-section>
</div>
