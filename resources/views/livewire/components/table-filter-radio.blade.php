<label class="flex cursor-pointer items-start gap-4 rounded-lg border border-gray-200 p-4 transition hover:bg-gray-50"
    :for="$label">
    <div class="flex items-center">
        <input wire:change="$parent.filter" wire:model="value" class="size-4 mt-1 rounded-full" type="radio"
            value="{{ $name }}" :id="$label" />
    </div>
    <div>
        <strong class="font-medium text-gray-900"> {{ $label }} </strong>
    </div>
</label>
