<div class="bg-white dark:bg-gray-800 overflow-hidden px-6 py-4 shadow rounded-lg {{ $class }}">
    <div class="py-4 px-2 mb-2 flex">
        <div class="w-full md:w-1/3 mx-2 pt-2">
            <b class="text-lg">{{ $pluralTitle }}</b>
        </div>
        <div class="w-full md:w-1/3 flex justify-end pr-4">
            <span
                class="inline-flex justify-end -space-x-px overflow-hidden rounded-md bg-white @if (!empty($storeRoute) || $exportable) border @endif">
                @if (!empty($storeRoute))
                    <a href="{{ route($storeRoute) }}" class="flex">
                        <button
                            class="inline-block px-4 py-2 text-xs font-medium text-gray-700 hover:bg-gray-50 focus:relative">
                            Add {{ $title }}
                        </button>
                    </a>
                @endif
                @if ($exportable)
                    <button wire:click="showExportModal"
                        class="inline-block px-4 py-2 text-xs font-medium text-gray-700 hover:bg-gray-50 focus:relative">
                        Export {{ $pluralTitle }}
                    </button>
                @endif
            </span>
        </div>
        <div class="w-full md:w-1/3">
            <div class="relative">
                <label for="Search" class="sr-only"> Search </label>
                <input type="text" id="Search" wire:model.live="searchTerm"
                    placeholder="Search {{ $title }}..."
                    class="w-full rounded-md py-2.5 ps-4 pe-10 text-xs border border-1 border-gray-200 focus:outline-none focus:ring-gray-600 focus:border-gray-600" />
                <span class="absolute inset-y-0 end-0 grid w-10 place-content-center">
                    <button type="button" class="text-gray-600 hover:text-gray-700">
                        <span class="sr-only"> Search </span>
                        <x-icon type="search" class="h-4 w-4" />
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
                            <th wire:key="{{ $loop->index }}"
                                class="whitespace-nowrap px-4 py-2 font-bold text-gray-900">
                                {!! $column !!}
                            </th>
                        @endforeach
                        @if ($actionable)
                            <th class="whitespace-nowrap px-4 py-2 font-bold text-gray-900"></th>
                        @endif
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($items as $item)
                        <tr wire:key="{{ $loop->index }}">
                            @foreach ($item as $data)
                                @if ($loop->index == 0)
                                    @continue
                                @endif
                                <td wire:key="{{ $loop->index }}"
                                    class="whitespace-nowrap px-4 py-2 font-medium text-gray-700">
                                    {!! $data !!}
                                </td>
                            @endforeach
                            @if ($actionable)
                                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-700">
                                    <div x-data="{ isActive: false }">
                                        <div
                                            class="inline-flex items-center overflow-hidden rounded-md border bg-white">
                                            @if (!empty($detailRoute))
                                                <a href="{{ route($detailRoute, ['id' => $item[0]]) }}"
                                                    class="border-e px-4 py-2 text-sm/none text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                                                    Detail
                                                </a>
                                            @endif
                                            <button x-on:click="isActive = !isActive"
                                                class="h-full p-2 text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                                                <span class="sr-only">Menu</span>
                                                <x-icon type="chevron-down" class="h-4 w-4" />
                                            </button>
                                        </div>
                                        <div class="absolute mt-2 w-56 divide-y divide-gray-100 rounded-md border border-gray-100 bg-white shadow-lg"
                                            role="menu" x-cloak x-transition x-show="isActive"
                                            x-on:click.away="isActive = false"
                                            x-on:keydown.escape.window="isActive = false">
                                            <div class="p-2">
                                                @if (!empty($detailRoute))
                                                    <a href="{{ route($detailRoute, ['id' => $item[0]]) }}"
                                                        class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                                                        role="menuitem"> See Detail </a>
                                                @endif
                                                @if (!empty($updateRoute))
                                                    <a href="{{ route($updateRoute) }}"
                                                        class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700"
                                                        role="menuitem"> Edit {{ $title }} </a>
                                                @endif
                                            </div>
                                            @if ($deleteable)
                                                <div class="p-2">
                                                    <button type="button"
                                                        wire:click="showDeleteModal({{ json_encode($item) }})"
                                                        class="flex w-full items-center gap-2 rounded-lg px-4 py-2 text-sm text-red-700 hover:bg-red-50"
                                                        role="menuitem">
                                                        <x-icon type="trash" class="h-4 w-4" />
                                                        Remove {{ $title }}
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    @if ($items->count() <= 0)
                        <tr>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center"
                                colspan="{{ count($columns) }}">
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
                        <button type="button"
                            class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
                            <span class="sr-only">Previous Page</span>
                            <x-icon type="chevron-left" class="h-3 w-3" />
                        </button>
                    </li>
                    <li class="block size-8 rounded border-gray-800 bg-gray-800 text-center leading-8 text-white"> 1
                    </li>
                    <li>
                        <button type="button"
                            class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180">
                            <span class="sr-only">Next Page</span>
                            <x-icon type="chevron-right" class="h-3 w-3" />
                        </button>
                    </li>
                </ol>
            </div>
        @endif
    </div>

    <!-- Export Modal -->
    <form wire:submit="export">
        <x-dialog-modal wire:key="export-modal" wire:model.live="showingExportModal">
            <x-slot name="title">
                {{ "Export $pluralTitle" }}
            </x-slot>
            <x-slot name="content">
                <div>
                    Export current data to your desired file format. Make sure to choose a
                    proper export file format according to your needs.
                </div>
                <div class="w-full flex mt-4">
                    <div class="w-full md:w-5/6">
                        <label for="exportFileName" class="block text-xs font-medium text-gray-700"> File Name
                        </label>
                        <input type="text" id="ExportFileName" placeholder="Type a file name"
                            wire:model="exportFileName"
                            class="mt-1 w-full text-sm rounded-lg border-gray-300 text-gray-700 focus:ring-gray-600 focus:border-gray-600" />
                        @error('exportFileName')
                            <div class="mt-1">
                                <span class="text-xs text-red-600">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/6 ml-4">
                        <label for="exportFileFormat" class="block text-xs font-medium text-gray-700"> File Format
                        </label>
                        <select name="exportFileFormat" id="export-file-format-select" wire:model="exportFileFormat"
                            class="mt-1 w-full text-sm rounded-lg border-gray-300 text-gray-700 focus:ring-gray-600 focus:border-gray-600">
                            @foreach ($supportedExportFileFormats as $format)
                                <option value="{{ $format }}">{{ $format }}</option>
                            @endforeach
                        </select>
                        @error('exportFileFormat')
                            <div class="mt-1">
                                <span class="text-xs text-red-600">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                </div>
                <div role="alert" class="rounded border-s-4 border-gray-500 bg-gray-50 p-4 mt-6">
                    <p class="text-sm text-gray-700">
                        System will start exporting and downloading the file after you click the <b>Export</b> button
                        below. Export process time may take a while depending on the data size.
                    </p>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="hideExportModal" wire:loading.attr="disabled" class="mr-4">
                    {{ __('Close') }}
                </x-secondary-button>
                <x-button wire:loading.attr="disabled">
                    {{ __('Export') }}
                </x-button>
            </x-slot>
        </x-dialog-modal>
    </form>
</div>
