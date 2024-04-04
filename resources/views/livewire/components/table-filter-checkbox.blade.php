<label class="flex cursor-pointer items-start gap-4 rounded-lg border border-gray-200 p-4 transition hover:bg-gray-50"
    :for="$label">
    <div class="flex items-center">
        <input
            class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-gray-600 shadow-sm focus:ring-gray-500 dark:focus:ring-gray-600 dark:focus:ring-offset-gray-800"
            wire:model="value" wire:change="$parent.filter" type="checkbox" :id="$label" />
    </div>
    <div>
        <strong class="font-medium text-gray-900"> {{ $label }} </strong>
    </div>
</label>
