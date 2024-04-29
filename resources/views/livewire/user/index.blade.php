<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12 grid grid-cols-1 gap-4 lg:grid-cols-4 lg:gap-12">
    <x-table-filter-card>
        <x-slot name="filters">
            <x-table-filter-section icon="identification" title="Roles" :divider="false">
                <x-slot name="filters">
                    @role('Super Administrator')
                        <livewire:components.table-filter-checkbox label="Super Administrator"
                            wire:model="filters.roles.super_administrator" />
                        <livewire:components.table-filter-checkbox label="Administrator"
                            wire:model="filters.roles.administrator" />
                        <livewire:components.table-filter-checkbox label="Technician"
                            wire:model="filters.roles.technician" />
                    @endrole
                    @role('Administrator')
                        <livewire:components.table-filter-checkbox label="Administrator"
                            wire:model="filters.roles.administrator" />
                        <livewire:components.table-filter-checkbox label="Technician"
                            wire:model="filters.roles.technician" />
                    @endrole
                    @role('Technician')
                        <livewire:components.table-filter-checkbox label="Technician"
                            wire:model="filters.roles.technician" />
                    @endrole
                </x-slot>
            </x-table-filter-section>
        </x-slot>
    </x-table-filter-card>
    <div class="lg:col-span-3 h-auto">
        <livewire:components.table @table-updated="$refresh" :data="$tableData" />
    </div>
</div>
