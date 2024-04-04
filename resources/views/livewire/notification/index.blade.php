<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12 grid grid-cols-1 gap-4 lg:grid-cols-4 lg:gap-12">
    <x-table-filter-card>
        <x-slot name="filters">
            <x-table-filter-section icon="clock" title="Time Range" :divider="false">
                <x-slot name="filters">
                    <livewire:components.table-filter-radio label="Today" name="today" wire:model="filters.times" />
                    <livewire:components.table-filter-radio label="Past Week" name="weekly" wire:model="filters.times" />
                    <livewire:components.table-filter-radio label="Past Month" name="monthly"
                        wire:model="filters.times" />
                </x-slot>
            </x-table-filter-section>
        </x-slot>
    </x-table-filter-card>
    <div class="lg:col-span-3 h-auto">
        <livewire:components.table @table-updated="$refresh" :data="$tableData" />
    </div>
</div>
