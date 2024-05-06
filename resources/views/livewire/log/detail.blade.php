<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <x-form-section submit="update">
        <x-slot name="title">
            {{ __('Log Information') }}
        </x-slot>
        <x-slot name="description">
            {{ __('See the information detail about the log activity.') }}
        </x-slot>
        <x-slot name="form">
            <!-- Severity -->
            <div class="col-span-6 sm:col-span-4">
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <x-label for="name" value="{{ __('Severity') }}" />
                        <div class="mt-2">
                            {!! $log->severity !!}
                        </div>
                    </div>
                    <div>
                        <x-label for="name" value="{{ __('Category') }}" />
                        <div class="mt-2">
                            {!! $log->category !!}
                        </div>
                    </div>
                    <div>
                        <x-label for="name" value="{{ __('Instance') }}" />
                        <div class="mt-2">
                            {!! $log->instance !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Time -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flex">
                    <x-label for="name" value="{{ __('Time') }}" />
                </div>
                <x-input id="name" autocomplete="name" type="text" value="{{ $log->time->diffForHumans() }}"
                    class="mt-1 block w-full text-sm disabled:shadow-none" disabled />
            </div>
            <!-- Messages -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flex">
                    <x-label for="name" value="{{ __('Messages') }}" />
                </div>
                <textarea id="messages" autocomplete="messages"
                    class="mt-1 block h-64 w-full text-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-gray-500 dark:focus:border-gray-600 focus:ring-gray-500 dark:focus:ring-gray-600 rounded-md shadow-sm disabled:shadow-none"
                    disabled>{{ $log->messages }}</textarea>
            </div>
        </x-slot>
        <x-slot name="actions">
            <a href="{{ route('logs') }}">
                <x-secondary-button>
                    {{ __('Back') }}
                </x-secondary-button>
            </a>
        </x-slot>
    </x-form-section>
</div>
