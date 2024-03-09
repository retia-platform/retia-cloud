@props([
    'title' => null,
    'buttons' => null,
    'columns' => null,
    'items' => null,
    'empty' => false,
])

<div class="bg-white overflow-hidden px-6 py-4 shadow rounded-lg">
    <div class="pt-5 pb-4 px-5 mb-2 flex">
        <div class="w-full md:w-2/3 pt-1 text-lg font-bold">{{ $title }}</div>
        <div class="w-full md:w-1/3 flex justify-end">
            {{ $buttons }}
        </div>
    </div>
    <div class="rounded-lg border border-gray-200 mx-4 mb-6">
        <div class="overflow-x-auto rounded-t-lg rounded-b-lg">
            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                <thead class="text-left">
                    <tr> {{ $columns }} </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @if ($empty)
                        <tr>
                            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center" colspan="5">
                                No Data Available
                            </td>
                        </tr>
                    @else
                        {{ $items }}
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
