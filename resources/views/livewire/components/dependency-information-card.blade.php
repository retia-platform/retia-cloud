<div class="bg-white overflow-hidden px-6 py-4 shadow rounded-lg {{ $class ?? '' }}">
    <div class="py-4 px-5 flex">
        <div class="w-full md:w-2/3 text-md font-bold"> {{ $title }} </div>
        <div class="w-full md:w-1/3 flex justify-end">
            <button type="button" wire:click="showModal">
                <x-icon type="informaton-circle" class="w-5 h-5" />
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
