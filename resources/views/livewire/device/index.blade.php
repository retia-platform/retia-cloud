<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12 grid grid-cols-1 gap-4 lg:grid-cols-4 lg:gap-12">
    <x-table-filter-card>
        <x-slot name="filters">
            <x-table-filter-section icon="tag" title="Brands" :divider="true">
                <x-slot name="filters">
                    <livewire:components.table-filter-checkbox label="Cisco" wire:model="filters.brands.cisco" />
                    <livewire:components.table-filter-checkbox label="MikroTik" wire:model="filters.brands.mikrotik" />
                    <livewire:components.table-filter-checkbox label="Juniper" wire:model="filters.brands.juniper" />
                </x-slot>
            </x-table-filter-section>
            <x-table-filter-section icon="rectangle-stack" title="Types" :divider="true">
                <x-slot name="filters">
                    <livewire:components.table-filter-checkbox label="Router" wire:model="filters.types.router" />
                    <livewire:components.table-filter-checkbox label="Access Point"
                        wire:model="filters.types.access_point" />
                    <livewire:components.table-filter-checkbox label="Programmable Switch"
                        wire:model="filters.types.programmable_switch" />
                </x-slot>
            </x-table-filter-section>
            <x-table-filter-section icon="bolt" title="Status" :divider="false">
                <x-slot name="filters">
                    <livewire:components.table-filter-checkbox label="Running" wire:model="filters.statuses.running" />
                    <livewire:components.table-filter-checkbox label="Down" wire:model="filters.statuses.down" />
                </x-slot>
            </x-table-filter-section>
        </x-slot>
    </x-table-filter-card>
    <div class="lg:col-span-3 h-auto">
        <livewire:components.table @table-updated="$refresh" :data="$tableData" />
    </div>
</div>
