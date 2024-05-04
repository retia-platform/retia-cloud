<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <x-stepper-device class="mb-12" />
    <x-form-section submit="store">
        <x-slot name="title">
            {{ __('Open Shortest Path First') }}
        </x-slot>
        <x-slot name="description">
            {{ __('Configure your device OSPF routing so that it can automatically route traffic on your network.') }}
        </x-slot>
        <x-slot name="content">
            <x-device-stepper-card class="mb-4" :device="$device" />
        </x-slot>
        <x-slot name="form">
            <!-- OSPF List  -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flow-root rounded-lg border border-gray-300 py-3 shadow-sm">
                    <dl class="-my-3 divide-y divide-gray-300 text-sm">
                        <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900 flex my-auto">
                                <x-icon type="hashtag" class="w-4 h-4 mt-0.5 me-1" />
                                <x-label for="ids" value="{{ __('ID') }}" />
                            </dt>
                            <dd class="text-gray-700 sm:col-span-2">
                                <x-input id="ids" autocomplete="ospf_id" wire:model="ids[0]" type="text"
                                    placeholder="127.0.0.1" class="mt-1 block w-full text-sm" />
                                <x-input-error for="ids" class="mt-2" />
                            </dd>
                        </div>
                        <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900 flex my-auto">
                                <x-icon type="wifi" class="w-4 h-4 mt-0.5 me-1" />
                                <x-label for="networks" value="{{ __('Network') }}" />
                            </dt>
                            <dd class="text-gray-700 sm:col-span-2">
                                <div class="rounded-lg border border-gray-300 p-2">
                                    <x-input autocomplete="ospf_network_ip_address"
                                        wire:model="networks[0]['ip_address']" type="text" placeholder="IP Address"
                                        class="block w-full text-sm" />
                                    <x-input autocomplete="ospf_network_wildcard" wire:model="networks[0]['wildcard']"
                                        type="text" placeholder="Wildcard" class="block w-full text-sm mt-2" />
                                    <x-input autocomplete="ospf_network_area" wire:model="networks[0]['area']"
                                        type="number" placeholder="Area" class="block w-full text-sm mt-2" />
                                </div>
                                <x-secondary-button wire:click="addNetwork" class="w-full justify-center mt-4">
                                    {{ __('Add Network') }}
                                </x-secondary-button>
                                <x-input-error for="networks" class="mt-2" />
                            </dd>
                        </div>
                        <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900 flex my-auto">
                                <x-icon type="viewfinder-circle" class="w-4 h-4 mt-0.5 me-1" />
                                <x-label for="ospf_passive_interfaces" value="{{ __('Passive Interfaces') }}" />
                            </dt>
                            <dd class="text-gray-700 sm:col-span-2">
                                <select id="ospf_passive_interfaces" name="ospf_passive_interfaces"
                                    wire:key="passiveInterfaces" wire:model="passiveInterfaces[]"
                                    class="w-full rounded-lg shadow-sm border-gray-300 text-gray-700 text-sm focus:ring-gray-600 focus:border-gray-600">
                                    @foreach (['GigabitEthernet1', 'GigabitEthernet2'] as $interface)
                                        <option value="{{ $interface }}"> {{ $interface }} </option>
                                    @endforeach
                                </select>
                                <x-secondary-button wire:click="addPassiveInterface" class="w-full justify-center mt-4">
                                    {{ __('Add Passive Interface') }}
                                </x-secondary-button>
                                <x-input-error for="rules" class="mt-2" />
                            </dd>
                        </div>
                        <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900 flex my-auto">
                                <x-icon type="arrow-path" class="w-4 h-4 mt-0.5 me-1" />
                                <x-label for="ospf_redistribute_connected" value="{{ __('Redistribute') }}" />
                            </dt>
                            <dd class="text-gray-700 sm:col-span-2">
                                <label for="ospf_redistribute_connected" class="flex items-center">
                                    <x-checkbox id="ospf_redistribute_connected" name="ospf_redistribute_connected"
                                        wire:model="redistributes['connected']" />
                                    <span class="ms-2 mb-0.3 text-sm text-gray-600 dark:text-gray-400">
                                        {{ __('Connected') }}
                                    </span>
                                </label>
                                <label for="ospf_redistribute_static" class="flex items-center mt-2">
                                    <x-checkbox id="ospf_redistribute_static" name="ospf_redistribute_static"
                                        wire:model="redistributes['static']" />
                                    <span class="ms-2 mb-0.3 text-sm text-gray-600 dark:text-gray-400">
                                        {{ __('Static') }}
                                    </span>
                                </label>
                            </dd>
                        </div>
                        <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900 flex my-auto">
                                <x-icon type="ellipsis-horizontal-circle" class="w-4 h-4 mt-0.5 me-1" />
                                <x-label for="misc" value="{{ __('Misc') }}" />
                            </dt>
                            <dd class="text-gray-700 sm:col-span-2">
                                <label for="ospf_default_information_originate" class="flex items-center">
                                    <x-checkbox id="ospf_default_information_originate"
                                        name="ospf_default_information_originate"
                                        wire:model="defaultInformationOriginate" />
                                    <span class="ms-2 mb-0.3 text-sm text-gray-600 dark:text-gray-400">
                                        {{ __('Default Information Originate') }}
                                    </span>
                                </label>
                            </dd>
                        </div>
                    </dl>
                </div>
                <x-secondary-button wire:click="addACL" class="w-full justify-center mt-4">
                    {{ __('Add Static Route') }}
                </x-secondary-button>
            </div>
            <!-- Alert -->
            <x-information-alert class="col-span-6 sm:col-span-4" title="Information"
                description="Check the <b>Default Information Originate</b> option if you want the device to automatically redistribute the default route." />
            <x-warning-alert class="col-span-6 sm:col-span-4" title="Warning"
                description="Please set the configuration carefully. Misconfiguring your device might cause error or unwanted result." />
        </x-slot>
        <x-slot name="actions">
            <div class="me-4 text-sm" wire:loading>
                {{ __('Applying...') }}
            </div>
            <a href="{{ route('devices.store5', ['device' => 'router-a']) }}">
                <x-secondary-button class="me-4">
                    {{ __('Back') }}
                </x-secondary-button>
            </a>
            <a href="{{ route('devices.store7', ['device' => 'router-a']) }}">
                <x-secondary-button class="me-4">
                    {{ __('Skip') }}
                </x-secondary-button>
            </a>
            <x-button wire:loading.attr="disabled">
                {{ __('Apply') }}
            </x-button>
        </x-slot>
    </x-form-section>
</div>
