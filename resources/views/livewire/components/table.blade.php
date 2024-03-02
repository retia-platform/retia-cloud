<div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg px-6 py-4 shadow sm:rounded-tl-md sm:rounded-tr-md">
    <div class="py-4 px-2 mb-2 flex">
        <div class="w-full md:w-1/3 mx-2 pt-2">
            <b class="text-lg">{{ $pluralTitle }}</b>
        </div>
        <div class="w-full md:w-1/3 grid justify-items-end pr-4">
            <span class="inline-flex -space-x-px overflow-hidden rounded-md border bg-white shadow-sm">
                @if(!empty(route($storeRoute)))
                <a wire:navigate href="{{ route($storeRoute) }}" class="flex">
                    <button class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:relative">
                    Add {{ $title }}
                    </button>
                </a>
                @endif

                <button class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:relative">
                    Export {{ $pluralTitle }}
                </button>
            </span>
        </div>
        <div class="w-full md:w-1/3">
            <div class="relative">
                <label for="Search" class="sr-only"> Search </label>
                <input type="text" id="Search" placeholder="Search {{ $title }}..." class="w-full rounded-md border-gray-200 focus:border-gray-800 py-2.5 pe-10 shadow-sm sm:text-sm" />
                <span class="absolute inset-y-0 end-0 grid w-10 place-content-center">
                    <button type="button" class="text-gray-600 hover:text-gray-700">
                        <span class="sr-only">Search</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </button>
                </span>
            </div>
        </div>
    </div>
    <div class="rounded-lg border border-gray-200 mx-2 mb-6">
        <div class="overflow-x-auto rounded-t-lg rounded-b-lg">
            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                <thead class="text-left">
                    <tr>
                        @foreach ($columns as $column)
                        <th wire:key="{{ $loop->index }}" class="whitespace-nowrap px-4 py-2 font-bold text-gray-900">{{ $column }}</th>
                        @endforeach
                        <th class="whitespace-nowrap px-4 py-2 font-bold text-gray-900"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($items as $item)
                    <tr wire:key="{{ $loop->index }}">
                        @foreach ($item as $data)
                        <td wire:key="{{ $loop->index }}" class="whitespace-nowrap px-4 py-2 font-medium text-gray-700">{!! $data !!}</td>
                        @endforeach
                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-700">
                            @if($actionable)
                            <div x-data="{ isActive: false }">
                                <div class="inline-flex items-center overflow-hidden rounded-md border bg-white">
                                    <a href="#" class="border-e px-4 py-2 text-sm/none text-gray-600 hover:bg-gray-50 hover:text-gray-700"> Edit </a>
                                    <button x-on:click="isActive = !isActive" class="h-full p-2 text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                                        <span class="sr-only">Menu</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="absolute mt-2 w-56 divide-y divide-gray-100 rounded-md border border-gray-100 bg-white shadow-lg" role="menu" x-cloak x-transition x-show="isActive" x-on:click.away="isActive = false" x-on:keydown.escape.window="isActive = false">
                                    <div class="p-2">
                                        <a href="#" class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700" role="menuitem"> See Detail</a>
                                        <a href="#" class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700" role="menuitem"> Edit {{ $title }} </a>
                                    </div>
                                    <div class="p-2">
                                        <button type="button" class="flex w-full items-center gap-2 rounded-lg px-4 py-2 text-sm text-red-700 hover:bg-red-50" role="menuitem">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg> Remove {{ $title }} </button>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @if (empty($items))
                    <tr>
                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center" colspan="6">
                            No {{ $title }} Available
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        @if ($paginate)
        <div class="rounded-b-lg border-t border-gray-200 px-4 py-2">
            <ol class="flex justify-end gap-1 text-xs font-medium">
                <li>
                    <button type="button" class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
                        <span class="sr-only">Previous Page</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </li>
                <li class="block size-8 rounded border-gray-800 bg-gray-800 text-center leading-8 text-white"> 1 </li>
                <li>
                    <button type="button" class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
                        <span class="sr-only">Next Page</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </li>
            </ol>
        </div>
        @endif
    </div>
</div>
