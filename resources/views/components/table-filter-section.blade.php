@props([
    'icon' => null,
    'title' => null,
    'filters' => null,
    'divider' => true,
])

<div>
    <div class="py-4 px-2 mt-2 flex">
        <x-icon class="w-5 h-5 mr-2 mt-1" :type="$icon" />
        <span class="text-lg font-bold"> {{ $title }} </span>
    </div>
    <fieldset class="px-2 mb-8 space-y-2">
        {{ $filters }}
    </fieldset>
    @if ($divider)
        <x-table-filter-divider />
    @endif
</div>
