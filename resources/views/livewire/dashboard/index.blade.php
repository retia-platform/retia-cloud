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
                    <div class="w-full md:w-2/3 pt-1">
                        <b class="text-lg">Top 10 Devices</b>
                    </div>
                    <div class="w-full md:w-1/3 flex justify-end">
                        <a wire:navigate href="{{ route('devices') }}">
                            <x-arrow-button>See All Devices</x-arrow-button>
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
        <div class="w-full grid grid-cols-1 lg:grid-cols-4 gap-12">
            @can('access pulse')
                <livewire:components.third-party-service-information-card wire:key="third-party-service-information-card-1"
                    title="System Usage" class="mt-12" overview="Check the current system usages and performances."
                    description="Get the latest system usage analytics using data that processed by Laravel Pulse.<br /><br />Laravel Pulse used to monitor the current Retia Cloud system usage anomaly and performance issues. The collected data are managed and processed by the Laravel Pulse."
                    button="Open Pulse" documentationURL="https://pulse.laravel.com" :url="route('pulse')" />
            @endcan
            @can('access telescope')
                <livewire:components.third-party-service-information-card wire:key="third-party-service-information-card-2"
                    title="System Log" class="mt-12" overview="Check the current system log data."
                    description="Get the latest system logs using data that processed by Laravel Telescope.<br /><br />Laravel Telescope used to monitor the current Retia Cloud system log to help you debug and trace any error or bug that happened. The collected data are managed and processed by the Laravel Telescope."
                    button="Open Telescope" documentationURL="https://github.com/laravel/telescope" :url="route('telescope')" />
            @endcan
            @can('access horizon')
                <livewire:components.third-party-service-information-card wire:key="third-party-service-information-card-3"
                    title="System Process" class="mt-12" overview="Check the current system processes."
                    description="Get the current system process information using data that processed by Laravel Horizon.<br /><br />Laravel Horizon used to monitor the current Retia Cloud system process to help you debug the process / job that running in background. The collected data are managed and processed by the Laravel Horizon."
                    button="Open Horizon" documentationURL="https://github.com/laravel/horizon" :url="route('horizon.index')" />
            @endcan
            @can('access health check')
                <livewire:components.third-party-service-information-card wire:key="third-party-service-information-card-4"
                    title="System Health" class="mt-12" overview="Check the current system health statistics."
                    description="Get the latest system health statistics using data that processed by Laravel Health.<br /><br />Laravel Health used to monitor the current Retia Cloud overall system health. The collected data are managed and processed by the Laravel Health."
                    button="Open Health" documentationURL="https://github.com/spatie/laravel-health" :url="route('health')" />
            @endcan
        </div>
        <div class="w-full grid grid-cols-1 lg:grid-cols-3 gap-12">
            <livewire:components.dependency-information-card wire:key="dependency-information-card-1"
                title="Prometheus" class="mt-12"
                description="Retia uses Prometheus to monitor and get the latest data from Retia Engine and Network Devices that already online in the system."
                url="https://prometheus.io" :version="$buildInformation['prometheus']['version'] ?? 'unknown'" :go-version="$buildInformation['prometheus']['goVersion'] ?? 'unknown'" :revision="$buildInformation['prometheus']['revision'] ?? 'unknown'" />
            <livewire:components.dependency-information-card wire:key="dependency-information-card-2"
                title="Alert Manager" class="mt-12"
                description="Retia uses Alert Manager to handle alerts sent by client applications such as the Prometheus server. This software also manage and persist the alert and notification data to be processed when system needed to."
                url="https://prometheus.io/docs/alerting/latest/alertmanager" :version="$buildInformation['alertmanager']['version'] ?? 'unknown'" :go-version="$buildInformation['alertmanager']['goVersion'] ?? 'unknown'"
                :revision="$buildInformation['alertmanager']['revision'] ?? 'unknown'" />
            <livewire:components.dependency-information-card wire:key="dependency-information-card-3"
                title="SNMP Exporter" class="mt-12"
                description="Retia uses SNMP Exporter to expose SNMP data in a format which Prometheus can ingest. This software needed to interact within several components in the system via SNMP protocol."
                url="https://github.com/prometheus/snmp_exporter" :version="$buildInformation['snmpexporter']['version'] ?? 'unknown'" :go-version="$buildInformation['snmpexporter']['goVersion'] ?? 'unknown'"
                :revision="$buildInformation['snmpexporter']['revision'] ?? 'unknown'" />
        </div>
    </div>
    <!-- Third Party Service Information Modal -->
    <livewire:components.third-party-service-information-modal wire:key="third-party-service-information-modal" />
    <!-- Dependency Information Modal -->
    <livewire:components.dependency-information-modal wire:key="dependency-information-modal" />
</div>
