<div class="bg-white overflow-hidden px-6 pt-4 shadow rounded-lg {{ $class ?? '' }}">
    <div class="py-4 px-5 flex">
        <div class="w-full md:w-3/4 text-lg font-bold">
            {{ $title }}
        </div>
        <div class="w-full md:w-1/4 flex justify-end">
            <button type="button" wire:click="showModal">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                </svg>
            </button>
        </div>
    </div>
    <div class="w-full px-5">
        <div class="w-full text-sm h-16 mb-2">
            {!! $overview !!}
        </div>
        <div class="w-full flex justify-end mb-10">
            <a href="{{ $url }}" target="_blank" rel="noopener noreferrer">
                <x-arrow-button>{{ $button }}</x-arrow-button>
            </a>
        </div>
    </div>
</div>
