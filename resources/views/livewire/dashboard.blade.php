<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex -mx-4">
            <div class="w-full md:w-1/2 px-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg px-6 py-4 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="py-4 px-5">
                        <b class="text-lg">{{ __('In Throughput Quota') }}</b>
                    </div>
                    <livewire:livewire-column-chart key="{{ $inThroughputChartModel->reactiveKey() }}" :column-chart-model="$inThroughputChartModel" />
                </div>
            </div>
            <div class="w-full md:w-1/2 px-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg px-6 py-4 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="py-4 px-5">
                        <b class="text-lg">{{ __('Out Throughput Quota') }}</b>
                    </div>
                    <livewire:livewire-column-chart key="{{ $outThroughputChartModel->reactiveKey() }}" :column-chart-model="$outThroughputChartModel" />
                </div>
            </div>
        </div>
        <div class="w-full py-12">
            <div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg px-6 py-4 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <div class="py-4 px-5 mb-4">
                    <b class="text-lg">{{ __('Top 10 Devices') }}</b>
                </div>
            </div>
        </div>
    </div>
</div>
