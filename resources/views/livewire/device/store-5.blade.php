<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <x-stepper-device class="mb-12" />
    <x-form-section submit="store">
        <x-slot name="title">
            {{ __('Static Routes') }}
        </x-slot>
        <x-slot name="description">
            {{ __('Configure your device static routes so that it can route the traffic by static configuration on your network.') }}
        </x-slot>
        <x-slot name="content">
            <x-device-stepper-card class="mb-4" :device="$device" />
        </x-slot>
        <x-slot name="form">
            <!-- Static Route List  -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flow-root rounded-lg border border-gray-300 py-3 shadow-sm">
                    <dl class="-my-3 divide-y divide-gray-300 text-sm">
                        <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900 flex my-auto">
                                <x-icon type="code-bracket-square" class="w-4 h-4 mt-0.5 me-1" />
                                <x-label for="prefixes" value="{{ __('Prefix') }}" />
                            </dt>
                            <dd class="text-gray-700 sm:col-span-2">
                                <x-input id="prefixes" autocomplete="static_route_prefix" wire:model="prefixes[0]"
                                    type="text" placeholder="127.0.0.1" class="mt-1 block w-full text-sm" />
                                <x-input-error for="prefixes" class="mt-2" />
                            </dd>
                        </div>
                        <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900 flex my-auto">
                                <x-icon type="code-bracket-square" class="w-4 h-4 mt-0.5 me-1" />
                                <x-label for="netmasks" value="{{ __('Netmask') }}" />
                            </dt>
                            <dd class="text-gray-700 sm:col-span-2">
                                <x-input id="netmasks" autocomplete="static_route_netmask" wire:model="netmasks[0]"
                                    type="text" placeholder="127.0.0.1" class="mt-1 block w-full text-sm" />
                                <x-input-error for="netmasks" class="mt-2" />
                            </dd>
                        </div>
                        <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900 flex my-auto">
                                <x-icon type="arrow-uturn-left" class="w-4 h-4 mt-0.5 me-1" />
                                <x-label for="forwards" value="{{ __('Forward List') }}" />
                            </dt>
                            <dd class="text-gray-700 sm:col-span-2">
                                <div class="rounded-lg border border-gray-300 p-2">
                                    <x-input autocomplete="forward_forward" wire:model="forwards[0]['forward']"
                                        type="text" placeholder="Forward" class="block w-full text-sm" />
                                    <x-input autocomplete="forward_metric" wire:model="forwards[0]['metric']"
                                        type="number" placeholder="Metric (default 1)"
                                        class="block w-full text-sm mt-2" />
                                </div>
                                <x-secondary-button wire:click="addForward" class="w-full justify-center mt-4">
                                    {{ __('Add Forward') }}
                                </x-secondary-button>
                                <x-input-error for="forwards" class="mt-2" />
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
                description="The forward list metric used as priority on forwarding packet in the network (value range 1 - 255). Lower metric will be more prioritized." />
            <x-warning-alert class="col-span-6 sm:col-span-4" title="Warning"
                description="Please set the configuration carefully. Misconfiguring your device might cause error or unwanted result." />
        </x-slot>
        <x-slot name="actions">
            <div class="me-4 text-sm" wire:loading>
                {{ __('Applying...') }}
            </div>
            <a href="{{ route('devices.store4', ['device' => 'router-a']) }}">
                <x-secondary-button class="me-4">
                    {{ __('Back') }}
                </x-secondary-button>
            </a>
            <a href="{{ route('devices.store6', ['device' => 'router-a']) }}">
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
