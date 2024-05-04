<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <x-stepper-device class="mb-12" />
    <x-form-section submit="store">
        <x-slot name="title">
            {{ __('Interfaces') }}
        </x-slot>
        <x-slot name="description">
            {{ __('Configure each interface that available on your network device.') }}
        </x-slot>
        <x-slot name="content">
            <x-device-stepper-card class="mb-4" :device="$device" />
        </x-slot>
        <x-slot name="form">
            <!-- Interface -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flex">
                    <x-icon type="viewfinder-circle" class="w-4 h-4 mt-0.5 me-1" />
                    <x-label for="name" value="{{ __('Interface') }}" />
                </div>
                <select id="name" name="name" wire:key="name" wire:model="name" wire:change="populate"
                    class="w-full text-sm rounded-lg shadow-sm border-gray-300 text-gray-700 text-md focus:ring-gray-600 focus:border-gray-600 mt-2">
                    @foreach ($interfaces as $interface)
                        <option value="{{ $interface->name }}"> {{ $interface->name }} </option>
                    @endforeach
                </select>
                <span class="mt-2 text-xs"> Choose the interface you want to configure. </span>
                <x-input-error for="name" class="mt-2" />
            </div>
            <!-- Configuration  -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flow-root rounded-lg border border-gray-300 py-3 shadow-sm">
                    <dl class="-my-3 divide-y divide-gray-300 text-sm">
                        <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900 flex my-auto">
                                <x-icon type="bolt" class="w-4 h-4 mt-0.5 me-1" />
                                <x-label for="status" value="{{ __('Status') }}" />
                            </dt>
                            <dd class="text-green-600 font-bold sm:col-span-2">
                                {{ __('Running') }}
                            </dd>
                        </div>
                        <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900 flex my-auto">
                                <x-icon type="power" class="w-4 h-4 mt-0.5 me-1" />
                                <x-label for="enable" value="{{ __('Enable') }}" />
                            </dt>
                            <dd class="text-gray-700 sm:col-span-2">
                                <select id="enables" name="enables" wire:key="enables" wire:model="enable"
                                    class="w-full rounded-lg shadow-sm border-gray-300 text-gray-700 text-sm focus:ring-gray-600 focus:border-gray-600">
                                    @foreach (['Enabled', 'Disabled'] as $enableState)
                                        <option value="{{ $enableState }}"> {{ $enableState }} </option>
                                    @endforeach
                                </select>
                            </dd>
                        </div>
                        <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900 flex my-auto">
                                <x-icon type="code-bracket-square" class="w-4 h-4 mt-0.5 me-1" />
                                <x-label for="ip_address" value="{{ __('IP Address') }}" />
                            </dt>
                            <dd class="text-gray-700 sm:col-span-2">
                                <x-input id="ip_address" autocomplete="interface_ip_address" wire:model="ipAddress"
                                    type="text" placeholder="127.0.0.1" class="mt-1 block w-full text-sm" />
                                <x-input-error for="ipAddress" class="mt-2" />
                            </dd>
                        </div>
                        <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900 flex my-auto">
                                <x-icon type="code-bracket-square" class="w-4 h-4 mt-0.5 me-1" />
                                <x-label for="netmask" value="{{ __('Netmask') }}" />
                            </dt>
                            <dd class="text-gray-700 sm:col-span-2">
                                <x-input id="netmask" autocomplete="interface_netmask" wire:model="netmask"
                                    type="text" placeholder="127.0.0.1" class="mt-1 block w-full text-sm" />
                                <x-input-error for="netmask" class="mt-2" />
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
            <!-- Alert -->
            <x-information-alert class="col-span-6 sm:col-span-4" title="Information"
                description="Changing the interface selection will automatically save the configuration above. You can't apply any configuration to interface that is down or not detected by system." />
            <x-warning-alert class="col-span-6 sm:col-span-4" title="Warning"
                description="Please set the configuration carefully. Misconfiguring your device might cause error or unwanted result." />
        </x-slot>
        <x-slot name="actions">
            <div class="me-4 text-sm" wire:loading>
                {{ __('Loading...') }}
            </div>
            <a href="{{ route('devices.store2') }}">
                <x-secondary-button class="me-4">
                    {{ __('Back') }}
                </x-secondary-button>
            </a>
            <a href="{{ route('devices.store4', ['device' => 'router-a']) }}">
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
