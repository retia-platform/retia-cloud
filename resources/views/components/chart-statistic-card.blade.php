@props([
    'title' => null,
    'headline1' => null,
    'headline2' => null,
    'selector' => null,
    'chart' => null,
    'empty' => false,
])

<div class="bg-white overflow-hidden px-6 pb-6 pt-4 shadow rounded-lg">
    <div class="pt-4 px-5 flex">
        <div class="w-full md:w-4/6">
            <div class="text-lg font-bold">{{ $title }}</div>
            @if ($headline1)
                <div>
                    <code class="text-xs">{{ $headline1 }}</code>
                </div>
            @endif
            @if ($headline2)
                <div>
                    <code class="text-xs">{{ $headline2 }}</code>
                </div>
            @endif
        </div>
        <div class="w-full md:w-2/6 justify-end grid grid-cols-1 gap-2">
            @if ($selector)
                {{ $selector }}
            @endif
        </div>
    </div>
    @if ($empty)
        <x-chart-statistic-card-placeholder />
    @else
        <div class="h-40">{{ $chart }}</div>
    @endif
</div>
