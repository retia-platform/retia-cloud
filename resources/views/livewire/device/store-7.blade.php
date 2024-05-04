<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <x-stepper-device class="mb-12" />
    <div class="mt-36 mx-auto">
        <x-icon type="check-badge" class="w-16 h-16 text-green-500 mx-auto" />
        <h1 class="text-green-500 text-2xl font-bold text-center mt-4"> {!! $device->name . __(' has been added successfully') !!} </h1>
        <p class="text-gray-600 text-md text-center mt-2">
            {{ __('Device information and configuration can be updated later in the system.') }} </p>
        <div class="flex justify-center mt-8">
            <a href="{{ route('devices') }}">
                <x-secondary-button class="me-4">
                    {{ __('Return to Device List') }}
                </x-secondary-button>
            </a>
        </div>
    </div>
</div>
