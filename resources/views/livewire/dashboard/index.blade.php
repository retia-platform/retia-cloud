<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex -mx-4">
            <div class="w-full md:w-1/2 px-4">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg px-6 py-4 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="pt-4 px-5 flex">
                        <div class="w-full md:w-1/2">
                            <b class="text-lg">{{ __('In Throughput Quota') }}</b>
                        </div>
                        <div class="w-full md:w-1/2 flex justify-end">
                            <span
                                class="inline-flex items-center justify-center rounded-full bg-gray-100 px-2.5 py-0.5 text-gray-700 mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="-ms-1 me-1.5 h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 0 1-1.161.886l-.143.048a1.107 1.107 0 0 0-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 0 1-1.652.928l-.679-.906a1.125 1.125 0 0 0-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 0 0-8.862 12.872M12.75 3.031a9 9 0 0 1 6.69 14.036m0 0-.177-.529A2.25 2.25 0 0 0 17.128 15H16.5l-.324-.324a1.453 1.453 0 0 0-2.328.377l-.036.073a1.586 1.586 0 0 1-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 0 1-5.276 3.67m0 0a9 9 0 0 1-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                                </svg>
                                <p class="whitespace-nowrap text-sm">{{ config('app.timezone') }}</p>
                            </span>
                            <span
                                class="inline-flex items-center justify-center rounded-full bg-gray-100 px-2.5 py-0.5 text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="-ms-1 me-1.5 h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <p class="whitespace-nowrap text-sm">Last 4 Hours</p>
                            </span>
                        </div>
                    </div>
                    <livewire:livewire-line-chart key="in-throughput-quota-chart" :line-chart-model="$inThroughputChartModel" />
                </div>
            </div>
            <div class="w-full md:w-1/2 px-4">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg px-6 py-4 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="pt-4 px-5 flex">
                        <div class="w-full md:w-1/2">
                            <b class="text-lg">{{ __('Out Throughput Quota') }}</b>
                        </div>
                        <div class="w-full md:w-1/2 flex justify-end">
                            <span
                                class="inline-flex items-center justify-center rounded-full bg-gray-100 px-2.5 py-0.5 text-gray-700 mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="-ms-1 me-1.5 h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 0 1-1.161.886l-.143.048a1.107 1.107 0 0 0-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 0 1-1.652.928l-.679-.906a1.125 1.125 0 0 0-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 0 0-8.862 12.872M12.75 3.031a9 9 0 0 1 6.69 14.036m0 0-.177-.529A2.25 2.25 0 0 0 17.128 15H16.5l-.324-.324a1.453 1.453 0 0 0-2.328.377l-.036.073a1.586 1.586 0 0 1-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 0 1-5.276 3.67m0 0a9 9 0 0 1-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                                </svg>
                                <p class="whitespace-nowrap text-sm">{{ config('app.timezone') }}</p>
                            </span>
                            <span
                                class="inline-flex items-center justify-center rounded-full bg-gray-100 px-2.5 py-0.5 text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="-ms-1 me-1.5 h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <p class="whitespace-nowrap text-sm">Last 4 Hours</p>
                            </span>
                        </div>
                    </div>
                    <livewire:livewire-line-chart key="out-throughput-quota-chart" :line-chart-model="$outThroughputChartModel" />
                </div>
            </div>
        </div>
        <div class="w-full py-12">
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg px-6 py-4 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <div class="pt-7 pb-4 px-5 mb-2 flex">
                    <div class="w-full md:w-1/2">
                        <b class="text-lg">{{ __('Top 10 Devices') }}</b>
                    </div>
                    <div class="w-full md:w-1/2 flex justify-end">
                        <a wire:navigate href="{{ route('devices') }}"
                            class="group relative inline-flex items-center overflow-hidden rounded border border-current px-6 py-2 text-gray-600 focus:outline-none focus:ring active:text-gray-500">
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
                                            {{ $device['hostname'] }}</td>
                                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-700">Cisco</td>
                                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-700">Router</td>
                                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-700">
                                            <code>{{ $device['mgmt_ipaddr'] }}</code>
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-2 font-bold text-green-600">🟢 Running</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex -mx-4">
            <div class="w-full md:w-1/3 px-4">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg px-6 py-4 shadow sm:rounded-tl-md sm:rounded-tr-md">
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
            <div class="w-full md:w-1/3 px-4">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg px-6 py-4 shadow sm:rounded-tl-md sm:rounded-tr-md">
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
            <div class="w-full md:w-1/3 px-4">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg px-6 py-4 shadow sm:rounded-tl-md sm:rounded-tr-md">
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
