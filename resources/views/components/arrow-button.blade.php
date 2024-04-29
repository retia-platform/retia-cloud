@props(['small' => false])

@if ($small)
    <div
        class="group relative inline-flex items-center overflow-hidden rounded border border-current px-7 py-2 text-gray-600 focus:outline-none focus:ring active:text-gray-500 text-xs">
        <span class="absolute -start-full transition-all group-hover:start-4">
            <x-icon type="arrow-long-right" class="w-4 h-4" />
        </span>
        <span class="font-medium transition-all group-hover:ms-4"> {{ $slot }} </span>
    </div>
@else
    <div
        class="group relative inline-flex items-center overflow-hidden rounded border border-current px-7 py-2 text-gray-600 focus:outline-none focus:ring active:text-gray-500 text-sm">
        <span class="absolute -start-full transition-all group-hover:start-5">
            <x-icon type="arrow-long-right" class="w-5 h-5" />
        </span>
        <span class="font-medium transition-all group-hover:ms-6"> {{ $slot }} </span>
    </div>
@endif
