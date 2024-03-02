<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex -mx-4">
            <div class="w-full md:w-1/4 px-4">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg px-6 py-4 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="py-4 px-2 mt-2 flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 mr-2 mt-1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.348 14.652a3.75 3.75 0 0 1 0-5.304m5.304 0a3.75 3.75 0 0 1 0 5.304m-7.425 2.121a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <b class="text-lg">{{ __('Applied Devices') }}</b>
                    </div>
                    <div class="px-2 mb-8">
                        <fieldset>
                            <div class="space-y-2">
                                <label for="Cisco"
                                    class="flex cursor-pointer items-start gap-4 rounded-lg border border-gray-200 p-4 transition hover:bg-gray-50">
                                    <div class="flex items-center"> &#8203; <input type="checkbox"
                                            class="size-4 rounded border-gray-300" id="Cisco" checked="true" />
                                    </div>
                                    <div>
                                        <strong class="font-medium text-gray-900"> R-A </strong>
                                    </div>
                                </label>
                                <label for="Mikrotik"
                                    class="flex cursor-pointer items-start gap-4 rounded-lg border border-gray-200 p-4 transition hover:bg-gray-50">
                                    <div class="flex items-center"> &#8203; <input type="checkbox"
                                            class="size-4 rounded border-gray-300" id="Mikrotik" checked="true" />
                                    </div>
                                    <div>
                                        <strong class="font-medium text-gray-900"> R-B </strong>
                                    </div>
                                </label>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-3/4 px-4">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg px-6 py-4 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="py-4 px-2 mb-2 flex">
                        <div class="w-full md:w-1/3 mx-2 pt-2">
                            <b class="text-lg">{{ __('Configuration') }}</b>
                        </div>
                        <div class="w-full md:w-1/3 grid justify-items-end pr-4">
                            <span class="inline-flex -space-x-px overflow-hidden rounded-md border bg-white shadow-sm">
                                <button
                                    class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:relative">
                                    Add Configuration
                                </button>

                                <button
                                    class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:relative">
                                    Export Data
                                </button>
                            </span>
                        </div>
                        <div class="w-full md:w-1/3">
                            <div class="relative">
                                <label for="Search" class="sr-only"> Search </label>
                                <input type="text" id="Search" placeholder="Search configuration..."
                                    class="w-full rounded-md border-gray-200 focus:border-gray-800 py-2.5 pe-10 shadow-sm sm:text-sm" />
                                <span class="absolute inset-y-0 end-0 grid w-10 place-content-center">
                                    <button type="button" class="text-gray-600 hover:text-gray-700">
                                        <span class="sr-only">Search</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                        </svg>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-lg border border-gray-200 mx-2 mb-6">
                        <div class="overflow-x-auto rounded-t-lg">
                            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                                <thead class="text-left">
                                    <tr>
                                        <th class="whitespace-nowrap px-4 py-2 font-bold text-gray-900">Name</th>
                                        <th class="whitespace-nowrap px-4 py-2 font-bold text-gray-900">Updated At</th>
                                        <th class="whitespace-nowrap px-4 py-2 font-bold text-gray-900"></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200"></tbody>
                            </table>
                        </div>
                        <div class="rounded-b-lg border-t border-gray-200 px-4 py-2">
                            <ol class="flex justify-end gap-1 text-xs font-medium">
                                <li>
                                    <a href="#"
                                        class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
                                        <span class="sr-only">Prev Page</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </li>
                                <li
                                    class="block size-8 rounded border-gray-800 bg-gray-800 text-center leading-8 text-white">
                                    1 </li>
                                <!-- <li><a href="#" class="block size-8 rounded border border-gray-100 bg-white text-center leading-8 text-gray-900"> 2 </a></li><li><a href="#" class="block size-8 rounded border border-gray-100 bg-white text-center leading-8 text-gray-900"> 3 </a></li><li><a href="#" class="block size-8 rounded border border-gray-100 bg-white text-center leading-8 text-gray-900"> 4 </a></li> -->
                                <li>
                                    <a href="#"
                                        class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
                                        <span class="sr-only">Next Page</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
