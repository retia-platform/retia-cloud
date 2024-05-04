<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <x-stepper-device class="mb-12" />
    <x-form-section submit="store">
        <x-slot name="title">
            {{ __('Connect The Device') }}
        </x-slot>
        <x-slot name="description">
            {!! __(
                'Help us connect the device to your own network topology so that we can monitor, configure, and analyze it.<br/><br/>Please follow these 6 steps to do it. Don\'t hestitate to contact our support team if you need any help.',
            ) !!}
        </x-slot>
        <x-slot name="content">
            <x-overview-card headline="#1" title="Know Your Device"
                description="Retia currently only support a device that uses Cisco IOS XE. This is a modern operating system for enterprise networks. It is designed to provide a high-quality user experience and to simplify the network operations. If you are using a different operating system, please contact our support team." />
            <x-overview-card class="mt-4" headline="#2" title="Design Your Network Topology"
                description="The network you use is not automatically created or designed by Retia. You should design and implement it by yourself. Use a network simulator software to help you, or ask a help to our support team." />
            <x-overview-card class="mt-4" headline="#3" title="Set The IP Address"
                description="After you decide what's device to be used, configure the IP Address on that device so that it can be reachable on the existing network." />
            <x-overview-card class="mt-4" headline="#4" title="Configure The RESTCONF"
                description="Retia communicate with your device through a protocol called RESTCONF. In order to communicate properly, you need to enable and setup RESTCONF on your device. Please read the instruction through public documentation or ask our support team for help." />
            <x-overview-card class="mt-4" headline="#5" title="Start The Retia Engine"
                description="Fire up an instance of Retia Engine on your Server or VM, and connect it to the network. If you already have one, skip this step. Just make sure your device can ping the Retia Engine Server successfully." />
            <x-overview-card class="mt-4" headline="#6" title="Just Make Sure!"
                description="If your device is already fully connected, accessible though network, and able to ping the Retia Server, it means that you're ready for the next step." />
            <div class="grid grid-cols-2 px-4 py-3 bg-gray-50 dark:bg-gray-800 text-end sm:px-6 shadow rounded-lg mt-4">
                <div class="flex justify-start">
                    <label for="hide_instruction" class="flex items-center">
                        <x-checkbox id="hide_instruction" name="hide_instruction" wire:model="hideInstruction" />
                        <span class="ms-2 mb-0.3 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Don\'t show this instruction again') }} </span>
                    </label>
                </div>
                <div class="flex justify-end">
                    <a href="{{ route('devices') }}">
                        <x-secondary-button type="button" class="me-4">
                            {{ __('Cancel') }}
                        </x-secondary-button>
                    </a>
                    <a href="{{ route('devices.store2') }}">
                        <x-button type="button">
                            {{ __('Next') }}
                        </x-button>
                    </a>
                </div>
            </div>
        </x-slot>
    </x-form-section>
</div>
