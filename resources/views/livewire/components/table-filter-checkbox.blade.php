<label class="flex cursor-pointer items-start gap-4 rounded-lg border border-gray-200 p-4 transition hover:bg-gray-50"
    :for="$label">
    <div class="flex items-center">
        <input class="size-4 mt-1 rounded border-gray-300 accent-gray-900" wire:model="value" wire:change="$parent.filter"
            type="checkbox" :id="$label" />
    </div>
    <div>
        <strong class="font-medium text-gray-900"> {{ $label }} </strong>
    </div>
</label>
