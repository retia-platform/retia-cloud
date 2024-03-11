<x-modal wire:model.live="showing" class="{{ $class ?? '' }}">
    <div class="px-6 py-4">
        <div class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ $title }}
        </div>
        <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
            {{ $description }}
            <div role="alert" class="rounded border-s-4 border-orange-500 bg-orange-50 p-4 mt-4">
                <div class="flex items-center gap-2 text-orange-800">
                    <x-icon type="exclamation-triangle" class="w-5 h-5" />
                    <strong class="block font-medium"> Retia Engine's Dependency </strong>
                </div>
                <p class="mt-2 text-sm text-red-700">
                    This is a core dependency that run by Retia Engine. Custom configuration, upgrade, or modification
                    may affect the whole system performance and accessibility.
                </p>
            </div>
        </div>
    </div>
    <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 dark:bg-gray-800 text-end">
        <x-secondary-button class="mr-4" wire:click="hide" wire:loading.attr="disabled">
            Close
        </x-secondary-button>
        <a href="{{ $url }}" target="_blank" rel="noopener noreferrer">
            <x-button wire:loading.attr="disabled">Read More</x-button>
        </a>
    </div>
</x-modal>
