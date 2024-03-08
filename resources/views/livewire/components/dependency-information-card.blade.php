<div class="bg-white overflow-hidden px-6 py-4 shadow rounded-lg {{ $class ?? '' }}">
    <div class="py-4 px-5 flex">
        <div class="w-full md:w-2/3">
            <b class="text-lg">{{ $title }}</b>
        </div>
        <div class="w-full md:w-1/3 flex justify-end">
            <button type="button" wire:click="showModal">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                </svg>
            </button>
        </div>
    </div>
    <div class="pt-2 pb-4 px-5">
        <div class="flow-root">
            <dl class="-my-3 divide-y divide-gray-100 text-sm">
                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Version</dt>
                    <dd class="text-gray-700 sm:col-span-2 overflow-auto">
                        <code>{{ $version }}</code>
                    </dd>
                </div>
                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Go Version</dt>
                    <dd class="text-gray-700 sm:col-span-2 overflow-auto">
                        <code>{{ $goVersion }}</code>
                    </dd>
                </div>
                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-gray-900">Revision</dt>
                    <dd class="text-gray-700 sm:col-span-2 overflow-auto">
                        <code>{{ $revision }}</code>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</div>
