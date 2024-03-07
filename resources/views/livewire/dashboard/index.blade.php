<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="w-full flex">
            <div class="w-full md:w-1/3">
                <article class="border border-gray-100 bg-white p-6 shadow rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Total Device</p>
                            <p class="text-2xl font-medium text-gray-900"> {{ $deviceAmount }} </p>
                        </div>
                        <span class="rounded-full bg-gray-100 p-3 mt-5 text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.348 14.652a3.75 3.75 0 0 1 0-5.304m5.304 0a3.75 3.75 0 0 1 0 5.304m-7.425 2.121a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                        </span>
                    </div>
                    <div class="mt-1 mb-2 flex gap-1 text-{{ $runningDeviceStatusColor }}-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        <p class="flex gap-2 text-xs">
                            <span class="font-bold"> {{ $runningDevicePercentage }}% </span>
                            <span class="text-gray-500"> Device Running </span>
                        </p>
                    </div>
                </article>
            </div>
            <div class="w-full md:w-1/3 ml-12">
                <article class="border border-gray-100 bg-white p-6 shadow rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Total Detector</p>
                            <p class="text-2xl font-medium text-gray-900"> {{ $detectorAmount }} </p>
                        </div>
                        <span class="rounded-full bg-gray-100 p-3 mt-5 text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>

                        </span>
                    </div>
                    <div class="mt-1 mb-2 flex gap-1 text-{{ $runningDetectorStatusColor }}-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        <p class="flex gap-2 text-xs">
                            <span class="font-bold"> {{ $runningDetectorPercentage }}% </span>
                            <span class="text-gray-500"> Detector Running </span>
                        </p>
                    </div>
                </article>
            </div>
            <div class="w-full md:w-1/3 ml-12">
                <article class="border border-gray-100 bg-white p-6 shadow rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Monthly Log Recorded</p>
                            <p class="text-2xl font-medium text-gray-900"> {{ $monthlyLogAmount }} </p>
                        </div>
                        <span class="rounded-full bg-gray-100 p-3 mt-5 text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>

                        </span>
                    </div>
                    <div class="mt-1 mb-2 flex gap-1 text-{{ $monthlyErrorLogStatusColor }}-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                        </svg>

                        <p class="flex gap-2 text-xs">
                            <span class="font-bold"> {{ $monthlyErrorLogAmount }} </span>
                            <span class="text-gray-500"> Log with Error Severity </span>
                        </p>
                    </div>
                </article>
            </div>
        </div>
        <div class="w-full flex pt-12">
            <div class="w-full md:w-1/2">
                <div class="bg-white overflow-hidden px-6 pb-6 pt-4 shadow rounded-lg">
                    <div class="pt-4 px-5 flex">
                        <div class="w-full md:w-4/6">
                            <div>
                                <b class="text-lg">{{ __('In Throughput') }}</b>
                            </div>
                            <div>
                                <code class="text-xs">unit measured in bit/sec.</code>
                            </div>
                            <div>
                                <code class="text-xs">on {{ config('app.timezone') }}, last 4 hours ago.</code>
                            </div>
                        </div>
                        <div class="w-full md:w-2/6 justify-end">
                            <div>
                                <select name="InThroughputDeviceSelect" id="in-throughput-device-select"
                                    wire:model="inThroughputDevice" wire:change="updateInThroughputs"
                                    class="w-full rounded-lg border-gray-300 text-gray-700 text-xs focus:ring-gray-600 focus:border-gray-600">
                                    @foreach ($devices as $device)
                                        <option value="{{ $device['name'] }}">{{ $device['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-2 @if (empty($inThroughputChartModel->data)) mb-0.5 @endif">
                                <select name="InThroughputInterfaceSelect" id="in-throughput-interface-select"
                                    wire:model="inThroughputInterface" wire:change="updateInThroughputs"
                                    class="w-full rounded-lg border-gray-300 text-gray-700 text-xs focus:ring-gray-600 focus:border-gray-600">
                                    @foreach ($interfaces as $interface)
                                        <option value="{{ $interface['name'] }}">{{ $interface['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    @if (empty($inThroughputChartModel->data))
                        <div class="w-full text-gray-600 mt-16 mb-12 p-2 flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4 m-0.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                            </svg>
                            <span class="text-sm ml-1">Data is not sufficient for analytics</span>
                        </div>
                    @else
                        <livewire:livewire-line-chart key="{{ $inThroughputChartModel->reactiveKey() }}"
                            :line-chart-model="$inThroughputChartModel" />
                    @endif
                </div>
            </div>
            <div class="w-full md:w-1/2 ml-12">
                <div class="bg-white overflow-hidden px-6 pb-6 pt-4 shadow rounded-lg">
                    <div class="pt-4 px-5 flex">
                        <div class="w-full md:w-4/6">
                            <div>
                                <b class="text-lg">{{ __('Out Throughput') }}</b>
                            </div>
                            <div>
                                <code class="text-xs">unit measured in bit/sec.</code>
                            </div>
                            <div>
                                <code class="text-xs">on {{ config('app.timezone') }}, last 4 hours ago.</code>
                            </div>
                        </div>
                        <div class="w-full md:w-2/6 justify-end">
                            <div>
                                <select name="OutThroughputDeviceSelect" id="out-throughput-device-select"
                                    wire:model="outThroughputDevice" wire:change="updateOutThroughputs"
                                    class="w-full rounded-lg border-gray-300 text-gray-700 text-xs focus:ring-gray-600 focus:border-gray-600">
                                    @foreach ($devices as $device)
                                        <option value="{{ $device['name'] }}">{{ $device['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-2 @if (empty($outThroughputChartModel->data)) mb-0.5 @endif">
                                <select name="OutThroughputInterfaceSelect" id="out-throughput-interface-select"
                                    wire:model="outThroughputInterface" wire:change="updateOutThroughputs"
                                    class="w-full rounded-lg border-gray-300 text-gray-700 text-xs focus:ring-gray-600 focus:border-gray-600">
                                    @foreach ($interfaces as $interface)
                                        <option value="{{ $interface['name'] }}">{{ $interface['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    @if (empty($outThroughputChartModel->data))
                        <div class="w-full text-gray-600 mt-16 mb-12 p-2 flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4 m-0.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                            </svg>
                            <span class="text-sm ml-1">Data is not sufficient for analytics</span>
                        </div>
                    @else
                        <livewire:livewire-line-chart key="{{ $outThroughputChartModel->reactiveKey() }}"
                            :line-chart-model="$outThroughputChartModel" />
                    @endif
                </div>
            </div>
        </div>
        <div class="w-full pt-12">
            <div class="bg-white overflow-hidden px-6 py-4 shadow rounded-lg">
                <div class="pt-6 pb-4 px-5 mb-2 flex">
                    <div class="w-full md:w-1/2 pt-1">
                        <b class="text-lg">{{ __('Top 10 Devices') }}</b>
                    </div>
                    <div class="w-full md:w-1/2 flex justify-end">
                        <a wire:navigate href="{{ route('devices') }}"
                            class="group relative inline-flex items-center overflow-hidden rounded border border-current px-7 py-2 text-gray-600 focus:outline-none focus:ring active:text-gray-500">
                            <span class="absolute -start-full transition-all group-hover:start-3">
                                <svg class="size-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </span>
                            <span class="text-sm font-medium transition-all group-hover:ms-4"> See All Devices </span>
                        </a>
                    </div>
                </div>
                <div class="rounded-lg border border-gray-200 mx-4 mb-6">
                    <div class="overflow-x-auto rounded-t-lg rounded-b-lg">
                        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                            <thead class="text-left">
                                <tr>
                                    <th class="whitespace-nowrap px-4 py-2 font-bold text-gray-900">Name</th>
                                    <th class="whitespace-nowrap px-4 py-2 font-bold text-gray-900">Brand</th>
                                    <th class="whitespace-nowrap px-4 py-2 font-bold text-gray-900">Type</th>
                                    <th class="whitespace-nowrap px-4 py-2 font-bold text-gray-900">IP Address</th>
                                    <th class="whitespace-nowrap px-4 py-2 font-bold text-gray-900">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($devices as $device)
                                    <tr>
                                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-700">
                                            {{ $device['name'] }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-700">
                                            {{ $device['brand'] }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-700">
                                            {{ $device['type'] }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-700">
                                            <code>{{ $device['ip_address'] }}</code>
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-2 font-bold">
                                            @if ($device['running'])
                                                <span class="text-green-600">🟢 Running</span>
                                            @else
                                                <span class="text-red-600">🔴 Down</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                @if (empty($devices))
                                    <tr>
                                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center"
                                            colspan="5">
                                            No Device Available
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full flex">
            @can('access pulse')
                <div class="w-full md:w-1/3 mt-12">
                    <div class="bg-white overflow-hidden px-6 py-4 shadow rounded-lg">
                        <div class="py-4 px-5 flex">
                            <div class="w-full md:w-1/2">
                                <b class="text-lg">{{ __('Pulse Analytics') }}</b>
                            </div>
                            <div class="w-full md:w-1/2 flex justify-end">
                                <button type="button" wire:click="$toggle('showingPrometheusBuildInformationModal')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="pt-2 pb-4 px-5">

                        </div>
                    </div>
                </div>
            @endcan
            @can('access telescope')
                <div class="w-full md:w-1/3 mt-12">
                    <div class="bg-white overflow-hidden px-6 py-4 shadow rounded-lg">
                        <div class="py-4 px-5 flex">
                            <div class="w-full md:w-1/2">
                                <b class="text-lg">{{ __('Telescope Analytics') }}</b>
                            </div>
                            <div class="w-full md:w-1/2 flex justify-end">
                                <button type="button" wire:click="$toggle('showingPrometheusBuildInformationModal')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="pt-2 pb-4 px-5">

                        </div>
                    </div>
                </div>
            @endcan
            @can('access horizon')
                <div class="w-full md:w-1/3 mt-12">
                    <div class="bg-white overflow-hidden px-6 py-4 shadow rounded-lg">
                        <div class="py-4 px-5 flex">
                            <div class="w-full md:w-1/2">
                                <b class="text-lg">{{ __('Horizon Analytics') }}</b>
                            </div>
                            <div class="w-full md:w-1/2 flex justify-end">
                                <button type="button" wire:click="$toggle('showingPrometheusBuildInformationModal')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="pt-2 pb-4 px-5">

                        </div>
                    </div>
                </div>
            @endcan
        </div>
        <div class="w-full flex pt-12">
            <div class="w-full md:w-1/3">
                <div class="bg-white overflow-hidden px-6 py-4 shadow rounded-lg">
                    <div class="py-4 px-5 flex">
                        <div class="w-full md:w-1/2">
                            <b class="text-lg">{{ __('Prometheus') }}</b>
                        </div>
                        <div class="w-full md:w-1/2 flex justify-end">
                            <button type="button" wire:click="$toggle('showingPrometheusBuildInformationModal')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
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
                                        <code>{{ $buildInformation['prometheus']['version'] ?? 'unknown' }}</code>
                                    </dd>
                                </div>
                                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                                    <dt class="font-medium text-gray-900">Go Version</dt>
                                    <dd class="text-gray-700 sm:col-span-2 overflow-auto">
                                        <code>{{ $buildInformation['prometheus']['goVersion'] ?? 'unknown' }}</code>
                                    </dd>
                                </div>
                                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                                    <dt class="font-medium text-gray-900">Revision</dt>
                                    <dd class="text-gray-700 sm:col-span-2 overflow-auto">
                                        <code>{{ $buildInformation['prometheus']['revision'] ?? 'unknown' }}</code>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/3 ml-12">
                <div class="bg-white overflow-hidden px-6 py-4 shadow rounded-lg">
                    <div class="py-4 px-5 flex">
                        <div class="w-full md:w-1/2">
                            <b class="text-lg">{{ __('Alert Manager') }}</b>
                        </div>
                        <div class="w-full md:w-1/2 flex justify-end">
                            <button type="button" wire:click="$toggle('showingAlertManagerBuildInformationModal')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
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
                                        <code>{{ $buildInformation['alertmanager']['version'] ?? 'unknown' }}</code>
                                    </dd>
                                </div>
                                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                                    <dt class="font-medium text-gray-900">Go Version</dt>
                                    <dd class="text-gray-700 sm:col-span-2 overflow-auto">
                                        <code>{{ $buildInformation['alertmanager']['goVersion'] ?? 'unknown' }}</code>
                                    </dd>
                                </div>
                                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                                    <dt class="font-medium text-gray-900">Revision</dt>
                                    <dd class="text-gray-700 sm:col-span-2 overflow-auto">
                                        <code>{{ $buildInformation['alertmanager']['revision'] ?? 'unknown' }}</code>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/3 ml-12">
                <div class="bg-white overflow-hidden px-6 py-4 shadow rounded-lg">
                    <div class="py-4 px-5 flex">
                        <div class="w-full md:w-1/2">
                            <b class="text-lg">{{ __('SNMP Exporter') }}</b>
                        </div>
                        <div class="w-full md:w-1/2 flex justify-end">
                            <button type="button" wire:click="$toggle('showingSnmpExporterBuildInformationModal')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
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
                                        <code>{{ $buildInformation['snmpexporter']['version'] ?? 'unknown' }}</code>
                                    </dd>
                                </div>
                                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                                    <dt class="font-medium text-gray-900">Go Version</dt>
                                    <dd class="text-gray-700 sm:col-span-2 overflow-auto">
                                        <code>{{ $buildInformation['snmpexporter']['goVersion'] ?? 'unknown' }}</code>
                                    </dd>
                                </div>
                                <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
                                    <dt class="font-medium text-gray-900">Revision</dt>
                                    <dd class="text-gray-700 sm:col-span-2 overflow-auto">
                                        <code>{{ $buildInformation['snmpexporter']['revision'] ?? 'unknown' }}</code>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Prometheus Build Information Modal -->
    <x-dialog-modal wire:key="prometheus-build-information-modal"
        wire:model.live="showingPrometheusBuildInformationModal">
        <x-slot name="title">
            {{ __('Prometheus') }}
        </x-slot>
        <x-slot name="content">
            {{ __('Retia uses Prometheus to monitor and get the latest data from Retia Engine and Network Devices that already online in the system.') }}
            <div role="alert" class="rounded border-s-4 border-orange-500 bg-orange-50 p-4 mt-4">
                <div class="flex items-center gap-2 text-orange-800">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                            clip-rule="evenodd" />
                    </svg>
                    <strong class="block font-medium"> Retia Engine's Dependency </strong>
                </div>
                <p class="mt-2 text-sm text-red-700">
                    This is a core dependency that run by Retia Engine. Custom configuration, upgrade, or modification
                    may affect the whole system performance and accessibility.
                </p>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showingPrometheusBuildInformationModal')"
                wire:loading.attr="disabled" class="mr-4">
                {{ __('Close') }}
            </x-secondary-button>
            <a href="https://prometheus.io" target="_blank" rel="noopener noreferrer">
                <x-button wire:loading.attr="disabled">
                    {{ __('Read More') }}
                </x-button>
            </a>
        </x-slot>
    </x-dialog-modal>
    <!-- Alert Manager Build Information Modal -->
    <x-dialog-modal wire:key="alert-manager-build-information-modal"
        wire:model.live="showingAlertManagerBuildInformationModal">
        <x-slot name="title">
            {{ __('Alert Manager') }}
        </x-slot>
        <x-slot name="content">
            {{ __('Retia uses Alert Manager to handle alerts sent by client applications such as the Prometheus server. This software also manage and persist the alert and notification data to be processed when system needed to.') }}
            <div role="alert" class="rounded border-s-4 border-orange-500 bg-orange-50 p-4 mt-4">
                <div class="flex items-center gap-2 text-orange-800">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                            clip-rule="evenodd" />
                    </svg>
                    <strong class="block font-medium"> Retia Engine's Dependency </strong>
                </div>
                <p class="mt-2 text-sm text-red-700">
                    This is a core dependency that run by Retia Engine. Custom configuration, upgrade, or modification
                    may affect the whole system performance and accessibility.
                </p>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showingAlertManagerBuildInformationModal')"
                wire:loading.attr="disabled" class="mr-4">
                {{ __('Close') }}
            </x-secondary-button>
            <a href="https://prometheus.io/docs/alerting/latest/alertmanager" target="_blank"
                rel="noopener noreferrer">
                <x-button wire:loading.attr="disabled">
                    {{ __('Read More') }}
                </x-button>
            </a>
        </x-slot>
    </x-dialog-modal>
    <!-- SNMP Exporter Build Information Modal -->
    <x-dialog-modal wire:key="snmp-exporter-build-information-modal"
        wire:model.live="showingSnmpExporterBuildInformationModal">
        <x-slot name="title">
            {{ __('SNMP Exporter') }}
        </x-slot>
        <x-slot name="content">
            {{ __('Retia uses SNMP Exporter to expose SNMP data in a format which Prometheus can ingest. This software needed to interact within several components in the system via SNMP protocol.') }}
            <div role="alert" class="rounded border-s-4 border-orange-500 bg-orange-50 p-4 mt-4">
                <div class="flex items-center gap-2 text-orange-800">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                        <path fill-rule="evenodd"
                            d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                            clip-rule="evenodd" />
                    </svg>
                    <strong class="block font-medium"> Retia Engine's Dependency </strong>
                </div>
                <p class="mt-2 text-sm text-red-700">
                    This is a core dependency that run by Retia Engine. Custom configuration, upgrade, or modification
                    may affect the whole system performance and accessibility.
                </p>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('showingSnmpExporterBuildInformationModal')"
                wire:loading.attr="disabled" class="mr-4">
                {{ __('Close') }}
            </x-secondary-button>
            <a href="https://github.com/prometheus/snmp_exporter" target="_blank" rel="noopener noreferrer">
                <x-button wire:loading.attr="disabled">
                    {{ __('Read More') }}
                </x-button>
            </a>
        </x-slot>
    </x-dialog-modal>
</div>
