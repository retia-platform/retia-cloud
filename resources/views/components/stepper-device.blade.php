@props([
    'class' => null,
    'connectStep' => request()->routeIs('devices.store1'),
    'informationStep' => request()->routeIs('devices.store2'),
    'interfaceStep' => request()->routeIs('devices.store3'),
    'aclStep' => request()->routeIs('devices.store4'),
    'staticRouteStep' => request()->routeIs('devices.store5'),
    'ospfStep' => request()->routeIs('devices.store6'),
    'completeStep' => request()->routeIs('devices.store7'),
])

<div class="{{ $class }}">
    <ol
        class="grid grid-cols-7 divide-x divide-gray-300 overflow-hidden rounded-lg border shadow-sm text-sm text-gray-500 bg-white">
        <li class="flex items-center justify-center gap-2 p-4 {{ $connectStep ? 'bg-gray-50' : 'bg-white' }}">
            <x-icon type="bolt" class="size-5 shrink-0" />
            <p class="leading-none">
                <strong class="block font-medium"> Connnect </strong>
            </p>
        </li>
        <li
            class="relative flex items-center justify-center gap-2 p-4 {{ $informationStep ? 'bg-gray-50' : 'bg-white' }}">
            @if ($connectStep)
                <span
                    class="absolute -left-2 top-1/2 hidden size-4 -translate-y-1/2 rotate-45 border border-gray-300 sm:block border-b-0 border-s-0 bg-gray-50"></span>
            @elseif ($informationStep)
                <span
                    class="absolute -left-2 top-1/2 hidden size-4 -translate-y-1/2 rotate-45 border border-gray-300 sm:block border-b-0 border-s-0 bg-white"></span>
            @else
                <span
                    class="absolute -left-2 top-1/2 hidden size-4 -translate-y-1/2 rotate-45 border border-gray-300 sm:block border-b-0 border-s-0 bg-white"></span>
                <span
                    class="absolute -right-2 top-1/2 hidden size-4 -translate-y-1/2 rotate-45 border border-gray-300 sm:block border-b-0 border-s-0 bg-white"></span>
            @endif
            <x-icon type="document-text" class="size-5 shrink-0" />
            <p class="leading-none">
                <strong class="block font-medium"> Information </strong>
            </p>
        </li>
        <li
            class="relative flex items-center justify-center gap-2 p-4 {{ $interfaceStep ? 'bg-gray-50' : 'bg-white' }}">
            @if ($informationStep)
                <span
                    class="absolute -left-2 top-1/2 hidden size-4 -translate-y-1/2 rotate-45 border border-gray-300 sm:block border-b-0 border-s-0 bg-gray-50"></span>
            @elseif ($interfaceStep)
                <span
                    class="absolute -left-2 top-1/2 hidden size-4 -translate-y-1/2 rotate-45 border border-gray-300 sm:block border-b-0 border-s-0 bg-white"></span>
            @else
                <span
                    class="absolute -left-2 top-1/2 hidden size-4 -translate-y-1/2 rotate-45 border border-gray-300 sm:block border-b-0 border-s-0 bg-white"></span>
                <span
                    class="absolute -right-2 top-1/2 hidden size-4 -translate-y-1/2 rotate-45 border border-gray-300 sm:block border-b-0 border-s-0 bg-white"></span>
            @endif
            <x-icon type="viewfinder-circle" class="size-5 shrink-0" />
            <p class="leading-none">
                <strong class="block font-medium"> Interface </strong>
            </p>
        </li>
        <li class="relative flex items-center justify-center gap-2 p-4 {{ $aclStep ? 'bg-gray-50' : 'bg-white' }}">
            @if ($interfaceStep)
                <span
                    class="absolute -left-2 top-1/2 hidden size-4 -translate-y-1/2 rotate-45 border border-gray-300 sm:block border-b-0 border-s-0 bg-gray-50"></span>
            @elseif ($aclStep)
                <span
                    class="absolute -left-2 top-1/2 hidden size-4 -translate-y-1/2 rotate-45 border border-gray-300 sm:block border-b-0 border-s-0 bg-white"></span>
            @else
                <span
                    class="absolute -left-2 top-1/2 hidden size-4 -translate-y-1/2 rotate-45 border border-gray-300 sm:block border-b-0 border-s-0 bg-white"></span>
                <span
                    class="absolute -right-2 top-1/2 hidden size-4 -translate-y-1/2 rotate-45 border border-gray-300 sm:block border-b-0 border-s-0 bg-white"></span>
            @endif
            <x-icon type="queue-list" class="size-5 shrink-0" />
            <p class="leading-none">
                <strong class="block font-medium"> ACL </strong>
            </p>
        </li>
        <li
            class="relative flex items-center justify-center gap-2 p-4 {{ $staticRouteStep ? 'bg-gray-50' : 'bg-white' }}">
            @if ($aclStep)
                <span
                    class="absolute -left-2 top-1/2 hidden size-4 -translate-y-1/2 rotate-45 border border-gray-300 sm:block border-b-0 border-s-0 bg-gray-50"></span>
            @elseif ($staticRouteStep)
                <span
                    class="absolute -left-2 top-1/2 hidden size-4 -translate-y-1/2 rotate-45 border border-gray-300 sm:block border-b-0 border-s-0 bg-white"></span>
            @else
                <span
                    class="absolute -left-2 top-1/2 hidden size-4 -translate-y-1/2 rotate-45 border border-gray-300 sm:block border-b-0 border-s-0 bg-white"></span>
                <span
                    class="absolute -right-2 top-1/2 hidden size-4 -translate-y-1/2 rotate-45 border border-gray-300 sm:block border-b-0 border-s-0 bg-white"></span>
            @endif
            <x-icon type="arrow-path" class="size-5 shrink-0" />
            <p class="leading-none">
                <strong class="block font-medium"> Static Route </strong>
            </p>
        </li>
        <li class="relative flex items-center justify-center gap-2 p-4 {{ $ospfStep ? 'bg-gray-50' : 'bg-white' }}">
            @if ($staticRouteStep)
                <span
                    class="absolute -left-2 top-1/2 hidden size-4 -translate-y-1/2 rotate-45 border border-gray-300 sm:block border-b-0 border-s-0 bg-gray-50"></span>
                <span
                    class="absolute -right-2 top-1/2 hidden size-4 -translate-y-1/2 rotate-45 border border-gray-300 sm:block border-b-0 border-s-0 bg-white"></span>
            @elseif ($ospfStep)
                <span
                    class="absolute -left-2 top-1/2 hidden size-4 -translate-y-1/2 rotate-45 border border-gray-300 sm:block border-b-0 border-s-0 bg-white"></span>
                <span
                    class="absolute -right-2 top-1/2 hidden size-4 -translate-y-1/2 rotate-45 border border-gray-300 sm:block border-b-0 border-s-0 bg-gray-50"></span>
            @else
                <span
                    class="absolute -left-2 top-1/2 hidden size-4 -translate-y-1/2 rotate-45 border border-gray-300 sm:block border-b-0 border-s-0 bg-white"></span>
                <span
                    class="absolute -right-2 top-1/2 hidden size-4 -translate-y-1/2 rotate-45 border border-gray-300 sm:block border-b-0 border-s-0 bg-white"></span>
            @endif
            <x-icon type="arrows-pointing-out" class="size-5 shrink-0" />
            <p class="leading-none">
                <strong class="block font-medium"> OSPF </strong>
            </p>
        </li>
        <li class="flex items-center justify-center gap-2 p-4 {{ $completeStep ? 'bg-gray-50' : 'bg-white' }}">
            <x-icon type="check-circle" class="size-5 shrink-0" />
            <p class="leading-none">
                <strong class="block font-medium"> Complete </strong>
            </p>
        </li>
    </ol>
    <div class="hidden grid-cols-1"></div>
    <div class="hidden grid-cols-2"></div>
    <div class="hidden grid-cols-3"></div>
    <div class="hidden grid-cols-4"></div>
    <div class="hidden grid-cols-5"></div>
    <div class="hidden grid-cols-6"></div>
    <div class="hidden grid-cols-7"></div>
    <div class="hidden grid-cols-8"></div>
</div>
