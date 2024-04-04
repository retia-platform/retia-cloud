<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <x-stepper-device class="mb-12" />
    <x-form-section submit="store">
        <x-slot name="title">
            {{ __('Device Information') }}
        </x-slot>
        <x-slot name="description">
            {{ __('Input your network device brand, type, and other informations based on the device that you\'ve connect to the network.') }}
        </x-slot>
        <x-slot name="form">
            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flex">
                    <x-icon type="hashtag" class="w-4 h-4 mt-0.5 me-1" />
                    <x-label for="name" value="{{ __('Name') }}" />
                </div>
                <x-input id="name" autocomplete="device_name" type="text" placeholder="device-x"
                    class="mt-1 block w-full text-sm" wire:model="name" />
                <span class="mt-2 text-xs"> A name must be lowercase, no space, no symbol, and min. 3 characters.
                </span>
                <x-input-error for="name" class="mt-2" />
                <x-input-error for="hostname" class="mt-2" />
            </div>
            <!-- Brand -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flex">
                    <x-icon type="tag" class="w-4 h-4 mt-0.5 me-1" />
                    <x-label for="brand" value="{{ __('Brand') }}" />
                </div>
                <select id="brand" name="brand" wire:key="brand" wire:model="brand"
                    class="w-full text-sm rounded-lg shadow-sm border-gray-300 text-gray-700 text-md focus:ring-gray-600 focus:border-gray-600 mt-2">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand['label'] }}"> {{ $brand['label'] }} </option>
                    @endforeach
                </select>
                <span class="mt-2 text-xs"> We highly recommend to use Cisco's device. </span>
                <x-input-error for="brand" class="mt-2" />
            </div>
            <!-- Type -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flex">
                    <x-icon type="rectangle-stack" class="w-4 h-4 mt-0.5 me-1" />
                    <x-label for="type" value="{{ __('Type') }}" />
                </div>
                <select id="type" name="type" wire:key="type" wire:model="type"
                    class="w-full text-sm rounded-lg shadow-sm border-gray-300 text-gray-700 text-md focus:ring-gray-600 focus:border-gray-600 mt-2">
                    @foreach ($types as $type)
                        <option value="{{ $type['label'] }}"> {{ $type['label'] }} </option>
                    @endforeach
                </select>
                <span class="mt-2 text-xs"> For most cases, you only need Router for network-related needs. </span>
                <x-input-error for="type" class="mt-2" />
                <x-input-error for="device_type" class="mt-2" />
            </div>
            <!-- IP Address -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flex">
                    <x-icon type="code-bracket-square" class="w-4 h-4 mt-0.5 me-1" />
                    <x-label for="ip_address" value="{{ __('IP Address') }}" />
                </div>
                <x-input id="ip_address" autocomplete="device_ip_address" type="text" placeholder="127.0.0.1"
                    class="mt-1 block w-full text-sm font-mono" wire:model="ipAddress" />
                <span class="mt-2 text-xs"> Make sure the IP Address given is the same with the one you set on the
                    device. </span>
                <x-input-error for="ipAddress" class="mt-2" />
                <x-input-error for="mgmt_ipaddr" class="mt-2" />
            </div>
            <!-- Port -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flex">
                    <x-icon type="viewfinder-circle" class="w-4 h-4 mt-0.5 me-1" />
                    <x-label for="port" value="{{ __('Port') }}" />
                </div>
                <x-input id="port" autocomplete="device_port" type="number" placeholder="443"
                    class="mt-1 block w-full text-sm font-mono" wire:model="port" />
                <span class="mt-2 text-xs"> Fill the port you use for the device RESTCONF. </span>
                <x-input-error for="port" class="mt-2" />
            </div>
            <!-- Username -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flex">
                    <x-icon type="at-symbol" class="w-4 h-4 mt-0.5 me-1" />
                    <x-label for="username" value="{{ __('Username') }}" />
                </div>
                <x-input id="username" autocomplete="device_username" type="text" placeholder="root"
                    class="mt-1 block w-full text-sm" wire:model="username" />
                <span class="mt-2 text-xs"> Fill the username you use for the device RESTCONF. </span>
                <x-input-error for="username" class="mt-2" />
            </div>
            <!-- Secret -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flex">
                    <x-icon type="finger-print" class="w-4 h-4 mt-0.5 me-1" />
                    <x-label for="secret" value="{{ __('Secret') }}" />
                </div>
                <x-input id="secret" autocomplete="device_secret" type="password" placeholder="****"
                    class="mt-1 block w-full text-sm" wire:model="secret" />
                <span class="mt-2 text-xs"> Fill the password / secret you use for the device RESTCONF. </span>
                <x-input-error for="secret" class="mt-2" />
                <x-input-error for="system" class="mt-2" />
            </div>
            <!-- Alert -->
            <x-warning-alert class="col-span-6 sm:col-span-4" title="Warning"
                description="This action cannot be undone. Make sure you have provided the correct device information." />
        </x-slot>
        <x-slot name="actions">
            <div class="me-4 text-sm" wire:loading>
                {{ __('Saving...') }}
            </div>
            <a wire:navigate href="{{ route('devices.store1') }}">
                <x-secondary-button class="me-4">
                    {{ __('Back') }}
                </x-secondary-button>
            </a>
            <a wire:navigate href="{{ route('devices.store3', ['device' => 'router-a']) }}">
                <x-secondary-button class="me-4">
                    {{ __('Skip') }}
                </x-secondary-button>
            </a>
            <x-button wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-form-section>
</div>
