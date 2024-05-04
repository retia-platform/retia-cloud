<div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">

    <!-- Amount Statistic Card -->
    <div class="w-full grid grid-cols-1 lg:grid-cols-3 gap-12">
        <x-amount-statistic-card wire:key="amount-statistic-card-1" title="Total Device" amount="{{ $deviceAmount }}"
            icon="signal" :percentageColor="$runningDeviceStatusColor" :percentage="$runningDevicePercentage . '%'" percentageInformation="Device Running" />
        <x-amount-statistic-card wire:key="amount-statistic-card-2" title="Total Detector" amount="{{ $detectorAmount }}"
            icon="eye" :percentageColor="$runningDetectorStatusColor" :percentage="$runningDetectorPercentage . '%'" percentageInformation="Detector Running" />
        <x-amount-statistic-card wire:key="amount-statistic-card-3" title="Monthly Log Recorded"
            amount="{{ $monthlyLogAmount }}" icon="document-text" :percentageColor="$monthlyErrorLogStatusColor" :percentage="$monthlyErrorLogAmount"
            percentageInformation="Log with Error Severity" />
    </div>

    <!-- Chart Statistic Card -->
    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-12 mt-12">
        <x-chart-statistic-card wire:key="chart-statistic-card-1" title="In Throughput"
            headline1="unit measured in bit/sec." headline2="on {{ config('app.timezone') }}, last 4 hours ago."
            :empty="empty($inThroughputChartModel->data)">
            <x-slot name="selector">
                <select wire:key="in-throughput-device-select" wire:model="inThroughputDevice"
                    wire:change="updateInThroughputs" name="InThroughputDeviceSelect" id="in-throughput-device-select"
                    class="w-full rounded-lg border-gray-300 text-gray-700 text-xs focus:ring-gray-600 focus:border-gray-600">
                    @foreach ($devices as $device)
                        <option value="{{ $device['name'] }}">{{ $device['name'] }}</option>
                    @endforeach
                </select>
                <select name="InThroughputInterfaceSelect" id="in-throughput-interface-select"
                    wire:model="inThroughputInterface" wire:change="updateInThroughputs"
                    class="w-full rounded-lg border-gray-300 text-gray-700 text-xs focus:ring-gray-600 focus:border-gray-600">
                    @foreach ($interfaces as $interface)
                        <option value="{{ $interface['name'] }}">{{ $interface['name'] }}</option>
                    @endforeach
                </select>
            </x-slot>
            <x-slot name="chart">
                <livewire:livewire-line-chart class="h-10" :key="$inThroughputChartModel->reactiveKey()" :line-chart-model="$inThroughputChartModel" />
            </x-slot>
        </x-chart-statistic-card>
        <x-chart-statistic-card wire:key="chart-statistic-card-2" title="Out Throughput"
            headline1="unit measured in bit/sec." headline2="on {{ config('app.timezone') }}, last 4 hours ago."
            :empty="empty($outThroughputChartModel->data)">
            <x-slot name="selector">
                <select wire:key="out-throughput-device-select" wire:model="outThroughputDevice"
                    wire:change="updateOutThroughputs" name="OutThroughputDeviceSelect"
                    id="out-throughput-device-select"
                    class="w-full rounded-lg border-gray-300 text-gray-700 text-xs focus:ring-gray-600 focus:border-gray-600">
                    @foreach ($devices as $device)
                        <option value="{{ $device['name'] }}">{{ $device['name'] }}</option>
                    @endforeach
                </select>
                <select name="OutThroughputInterfaceSelect" id="out-throughput-interface-select"
                    wire:model="outThroughputInterface" wire:change="updateOutThroughputs"
                    class="w-full rounded-lg border-gray-300 text-gray-700 text-xs focus:ring-gray-600 focus:border-gray-600">
                    @foreach ($interfaces as $interface)
                        <option value="{{ $interface['name'] }}">{{ $interface['name'] }}</option>
                    @endforeach
                </select>
            </x-slot>
            <x-slot name="chart">
                <livewire:livewire-line-chart :key="$outThroughputChartModel->reactiveKey()" :line-chart-model="$outThroughputChartModel" />
            </x-slot>
        </x-chart-statistic-card>
    </div>

    <!-- Table Statistic Card -->
    <div class="w-full grid grid-cols-1 lg:grid-cols-1 gap-12 mt-12">
        <x-table-statistic-card wire:key="table-statistic-card-1" title="Top 10 Devices" :empty="empty($devices)">
            <x-slot name="buttons">
                <a href="{{ route('devices') }}">
                    <x-arrow-button>See All Devices</x-arrow-button>
                </a>
            </x-slot>
            <x-slot name="columns">
                <th class="px-4 py-2 font-medium text-gray-700">Name</th>
                <th class="px-4 py-2 font-medium text-gray-700">Brand</th>
                <th class="px-4 py-2 font-medium text-gray-700">Type</th>
                <th class="px-4 py-2 font-medium text-gray-700">IP Address</th>
                <th class="px-4 py-2 font-medium text-gray-700">Status</th>
            </x-slot>
            <x-slot name="items">
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
            </x-slot>
        </x-table-statistic-card>
    </div>

    <!-- Third Party Service Information Card -->
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

    <!-- Dependency Information Card -->
    <div class="w-full grid grid-cols-1 lg:grid-cols-3 gap-12">
        <livewire:components.dependency-information-card wire:key="dependency-information-card-1" title="Prometheus"
            class="mt-12"
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

    <!-- Third Party Service Information Modal -->
    <livewire:components.third-party-service-information-modal wire:key="third-party-service-information-modal" />

    <!-- Dependency Information Modal -->
    <livewire:components.dependency-information-modal wire:key="dependency-information-modal" />
</div>
