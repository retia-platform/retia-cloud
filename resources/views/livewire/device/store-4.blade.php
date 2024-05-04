<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <x-stepper-device class="mb-12" />
    <x-form-section submit="store">
        <x-slot name="title">
            {{ __('Access Control List') }}
        </x-slot>
        <x-slot name="description">
            {{ __('Configure the access control list in order to limit the access of confidential data or restricting unauthorized users from accessing certain resources on your network device.') }}
        </x-slot>
        <x-slot name="content">
            <x-device-stepper-card class="mb-4" :device="$device" />
        </x-slot>
        <x-slot name="form">
            <!-- ACL Detail List  -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flow-root rounded-lg border border-gray-300 py-3 shadow-sm">
                    <dl class="-my-3 divide-y divide-gray-300 text-sm">
                        <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900 flex my-auto">
                                <x-icon type="hashtag" class="w-4 h-4 mt-0.5 me-1" />
                                <x-label for="names" value="{{ __('Name') }}" />
                            </dt>
                            <dd class="text-gray-700 sm:col-span-2">
                                <x-input id="names" autocomplete="acl_name" wire:model="names[0]" type="text"
                                    placeholder="acl-default" class="mt-1 block w-full text-sm" />
                                <x-input-error for="names" class="mt-2" />
                            </dd>
                        </div>
                        <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900 flex my-auto">
                                <x-icon type="viewfinder-circle" class="w-4 h-4 mt-0.5 me-1" />
                                <x-label for="interfaces" value="{{ __('Interfaces') }}" />
                            </dt>
                            <dd class="text-gray-700 sm:col-span-2">
                                <div class="grid grid-cols-3 gap-2">
                                    <select id="interfaces" name="interfaces" wire:key="interfaces"
                                        wire:model="interfaces[0]"
                                        class="col-span-2 w-full rounded-lg shadow-sm border-gray-300 text-gray-700 text-sm focus:ring-gray-600 focus:border-gray-600">
                                        @foreach ([['name' => 'GigabitEthernet1']] as $interface)
                                            <option value="{{ $interface['name'] }}"> {{ $interface['name'] }} </option>
                                        @endforeach
                                    </select>
                                    <select id="interfaces" name="interfaces" wire:key="interfaces"
                                        wire:model="interfaces[0]"
                                        class="w-full rounded-lg shadow-sm border-gray-300 text-gray-700 text-sm focus:ring-gray-600 focus:border-gray-600">
                                        @foreach (['in', 'out'] as $interfaceState)
                                            <option value="{{ $interfaceState }}"> {{ $interfaceState }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <x-secondary-button wire:click="addInterface" class="w-full justify-center mt-3">
                                    {{ __('Add Interface') }}
                                </x-secondary-button>
                                <x-input-error for="interfaces" class="mt-2" />
                            </dd>
                        </div>
                        <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900 flex my-auto">
                                <x-icon type="adjustments-horizontal" class="w-4 h-4 mt-0.5 me-1" />
                                <x-label for="rules" value="{{ __('Rules') }}" />
                            </dt>
                            <dd class="text-gray-700 sm:col-span-2">
                                <div class="rounded-lg border border-gray-300 p-2">
                                    <x-input autocomplete="rule_prefix" wire:model="rules[0]['prefix']" type="text"
                                        placeholder="Prefix" class="block w-full text-sm" />
                                    <x-input autocomplete="rule_wildcard" wire:model="rules[0]['wildcard']"
                                        type="text" placeholder="Wildcard" class="block w-full text-sm mt-2" />
                                    <x-input autocomplete="rule_sequence" wire:model="rules[0]['sequence']"
                                        type="number" placeholder="Sequence" class="block w-full text-sm mt-2" />
                                    <select id="actions" name="actions" wire:key="actions"
                                        wire:model="rules[0]['action']"
                                        class="w-full rounded-lg shadow-sm border-gray-300 text-gray-700 text-sm focus:ring-gray-600 focus:border-gray-600 mt-2">
                                        @foreach (['allow', 'deny'] as $ruleAction)
                                            <option value="{{ $ruleAction }}"> {{ $ruleAction }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <x-secondary-button wire:click="addRule" class="w-full justify-center mt-3">
                                    {{ __('Add Rule') }}
                                </x-secondary-button>
                                <x-input-error for="rules" class="mt-2" />
                            </dd>
                        </div>
                    </dl>
                </div>
                <x-secondary-button wire:click="addACL" class="w-full justify-center mt-3">
                    {{ __('Add ACL') }}
                </x-secondary-button>
            </div>
            <!-- Alert -->
            <x-warning-alert class="col-span-6 sm:col-span-4" title="Warning"
                description="Please set the configuration carefully. Misconfiguring your device might cause error or unwanted result." />
        </x-slot>
        <x-slot name="actions">
            <div class="me-4 text-sm" wire:loading>
                {{ __('Applying...') }}
            </div>
            <a href="{{ route('devices.store3', ['device' => 'router-a']) }}">
                <x-secondary-button class="me-4">
                    {{ __('Back') }}
                </x-secondary-button>
            </a>
            <a href="{{ route('devices.store5', ['device' => 'router-a']) }}">
                <x-secondary-button class="me-4">
                    {{ __('Skip') }}
                </x-secondary-button>
            </a>
            <a href="{{ route('devices.store5', ['device' => 'router-a']) }}">
                <x-button>
                    {{ __('Apply') }}
                </x-button>
            </a>
            <!-- <x-button wire:loading.attr="disabled">
                {{ __('Apply') }}
            </x-button> -->
        </x-slot>
    </x-form-section>
</div>
