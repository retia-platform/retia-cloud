<div class="bg-white overflow-hidden px-6 pt-4 shadow rounded-lg {{ $class ?? '' }}">
    <div class="py-4 px-5 flex">
        <div class="w-full md:w-3/4 text-md font-bold">
            {{ $title }}
        </div>
        <div class="w-full md:w-1/4 flex justify-end">
            <button type="button" wire:click="showModal">
                <x-icon type="information-circle" class="w-5 h-5" />
            </button>
        </div>
    </div>
    <div class="w-full px-5">
        <div class="w-full text-sm h-16 mb-2">
            {!! $overview !!}
        </div>
        <div class="w-full flex justify-end mb-10">
            <a href="{{ $url }}" target="_blank" rel="noopener noreferrer">
                <x-arrow-button :small="true">{{ $button }}</x-arrow-button>
            </a>
        </div>
    </div>
</div>
