<x-modal wire:model.live="showing" class="{{ $class ?? '' }}">
    <div class="px-6 py-4">
        <div class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ $title }}
        </div>
        <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
            {!! $description !!}
            <div role="alert" class="rounded border-s-4 border-gray-500 bg-gray-50 p-4 mt-4">
                <div class="flex items-center gap-2 text-gray-800">
                    <x-icon type="information-circle" class="h-5 w-5" />
                    <strong class="block font-medium"> Retia Cloud's Service </strong>
                </div>
                <p class="mt-2 text-sm text-gray-700">
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
