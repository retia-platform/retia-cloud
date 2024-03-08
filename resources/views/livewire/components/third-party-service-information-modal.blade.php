<x-modal wire:model.live="showing" class="{{ $class ?? '' }}">
    <div class="px-6 py-4">
        <div class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ $title }}
        </div>
        <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
            {!! $description !!}
            <div role="alert" class="rounded border-s-4 border-orange-500 bg-orange-50 p-4 mt-4">
                <div class="flex items-center gap-2 text-orange-800">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                            clip-rule="evenodd" />
                    </svg>
                    <strong class="block font-medium"> Retia Cloud's Service </strong>
                </div>
                <p class="mt-2 text-sm text-red-700">
                    This is a third-party service that integrated with Retia Cloud. All data is collected and processed
                    in real-time to ensure the system is running smoothly and efficiently.
                </p>
            </div>
        </div>
    </div>
    <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 dark:bg-gray-800 text-end">
        <x-secondary-button class="mr-4" wire:click="hide" wire:loading.attr="disabled">
            Close
        </x-secondary-button>
        <a href="{{ $documentationURL }}" target="_blank" rel="noopener noreferrer">
            <x-button wire:loading.attr="disabled">Read More</x-button>
        </a>
    </div>
</x-modal>
