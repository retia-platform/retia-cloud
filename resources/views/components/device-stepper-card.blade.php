@props([
    'class' => null,
    'device' => null,
])

<div class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6 shadow sm:rounded-md {{ $class }}">
    <div class="grid grid-cols-8 gap-6">
        <div class="col-span-1 flex items-center">
            <img class="w-auto h-auto my-auto" alt="Cisco"
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/08/Cisco_logo_blue_2016.svg/1024px-Cisco_logo_blue_2016.svg.png" />
        </div>
        <div class="col-span-5 items-start ps-4">
            <h3 class="text-md font-bold text-gray-900 dark:text-gray-100">
                {{ $device->name }}
            </h3>
            <div class="text-sm text-gray-900 dark:text-gray-100 mt-1">
                {{ $device->type }} |
                <span class="font-mono">
                    {{ $device->ipAddress }}
                </span>
            </div>
        </div>
        <div class="col-span-2 items-end content-center">
            <div class="flex my-auto justify-end">
                <h3 class="text-sm font-bold text-gray-800 me-2">
                    Status:
                </h3>
                <h3 class="text-sm font-bold text-green-600">
                    Running
                </h3>
            </div>
        </div>
    </div>
</div>
