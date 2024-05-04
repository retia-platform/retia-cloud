@props(['label'])

<label
    class="flex cursor-pointer items-start gap-4 rounded-lg border border-gray-200 p-4 transition hover:bg-gray-50 text-sm"
    :for="$label">
    <div class="flex items-center">
        <input class="rounded border-gray-300 text-gray-900 shadow-sm mt-0.5" wire:model="value"
            wire:change="$parent.filter" type="checkbox" :id="$label" />
    </div>
    <div>
        <strong class="font-medium text-gray-900"> {{ $label }} </strong>
    </div>
</label>
