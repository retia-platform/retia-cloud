<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12 grid grid-cols-1 gap-4 lg:grid-cols-4 lg:gap-12">
    <x-table-filter-card>
        <x-slot name="filters">
            <x-table-filter-section icon="clock" title="Time Range" :divider="true">
                <x-slot name="filters">
                    <livewire:components.table-filter-radio label="Today" name="today" wire:model="filters.time" />
                    <livewire:components.table-filter-radio label="Past Week" name="weekly" wire:model="filters.time" />
                    <livewire:components.table-filter-radio label="Past Month" name="monthly"
                        wire:model="filters.time" />
                </x-slot>
            </x-table-filter-section>
            <x-table-filter-section icon="exclamation-triangle" title="Severity" :divider="true">
                <x-slot name="filters">
                    <livewire:components.table-filter-checkbox label="Information" wire:model="filters.severity.info" />
                    <livewire:components.table-filter-checkbox label="Warning" wire:model="filters.severity.warning" />
                    <livewire:components.table-filter-checkbox label="Error" wire:model="filters.severity.error" />
                    <livewire:components.table-filter-checkbox label="Unknown" wire:model="filters.severity.unknown" />
                </x-slot>
            </x-table-filter-section>
            <x-table-filter-section icon="rectangle-stack" title="Category" :divider="true">
                <x-slot name="filters">
                    <livewire:components.table-filter-checkbox label="Device" wire:model="filters.category.device" />
                    <livewire:components.table-filter-checkbox label="Detector"
                        wire:model="filters.category.detector" />
                    <livewire:components.table-filter-checkbox label="Interface"
                        wire:model="filters.category.interface" />
                    <livewire:components.table-filter-checkbox label="ACL" wire:model="filters.category.acl" />
                    <livewire:components.table-filter-checkbox label="Static Route"
                        wire:model="filters.category.static_route" />
                    <livewire:components.table-filter-checkbox label="OSPF" wire:model="filters.category.ospf" />
                    <livewire:components.table-filter-checkbox label="Unknown" wire:model="filters.category.unknown" />
                </x-slot>
            </x-table-filter-section>
            <x-table-filter-section icon="cube" title="Instance" :divider="false">
                <x-slot name="filters">
                    <livewire:components.table-filter-checkbox label="Engine" wire:model="filters.instance.engine" />
                    <livewire:components.table-filter-checkbox label="Device" wire:model="filters.instance.device" />
                    <livewire:components.table-filter-checkbox label="Unknown" wire:model="filters.instance.unknown" />
                </x-slot>
            </x-table-filter-section>
        </x-slot>
    </x-table-filter-card>
    <div class="lg:col-span-3 h-auto">
        <livewire:components.table @table-updated="$refresh" :data="$tableData" />
    </div>
</div>
