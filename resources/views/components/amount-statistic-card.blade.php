@props([
    'color' => 'gray',
    'percentageColor' => 'gray',
    'icon' => 'document-text',
    'title' => null,
    'amount' => 0,
    'percentage' => 0,
    'percentageInformation' => null,
])

<article class="border border-gray-100 bg-white p-6 shadow rounded-lg">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-sm text-gray-500"> {{ $title }} </p>
            <p class="text-2xl font-medium text-gray-900"> {{ $amount }} </p>
        </div>
        <span class="rounded-full bg-{{ $color }}-100 p-3 mt-5 text-{{ $color }}-600">
            <x-icon class="w-8 h-8" type="{{ $icon }}" />
        </span>
    </div>
    <div class="mt-1 mb-2 flex gap-1 text-{{ $percentageColor }}-600">
        <x-icon class="h-4 w-4" type="arrow-trending-up" />
        <p class="flex gap-2 text-xs">
            <span class="font-bold"> {{ $percentage }} </span>
            <span class="text-gray-500"> {{ $percentageInformation }} </span>
        </p>
    </div>
</article>
