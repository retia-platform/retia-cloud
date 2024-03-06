<?php

namespace App\Livewire\Device;

use App\Exports\DeviceExport;
use App\Interfaces\TableComponent;
use App\Repositories\DeviceRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class Index extends Component implements TableComponent
{
    public array $filters = [
        'brands' => [
            'cisco' => true,
            'mikrotik' => false,
            'juniper' => false,
        ],
        'types' => [
            'router' => true,
            'access_point' => false,
            'programmable_switch' => false,
        ],
        'statuses' => [
            'running' => true,
            'down' => true,
        ],
    ];

    private Collection $devices;

    public static function getTableColumns(): array
    {
        return [
            'Device',
            'Brand',
            'Type',
            'IP Address',
            'Status',
            'Created At',
        ];
    }

    public function getTableData(): array
    {
        return [
            'title' => 'Device',
            'detailRoute' => 'devices.detail',
            'storeRoute' => 'devices.store',
            'updateRoute' => 'devices.update',
            'actionable' => true,
            'deleteable' => true,
            'exportable' => true,
            'paginate' => true,
            'columns' => collect(self::getTableColumns()),
            'items' => $this->getTableItems(),
        ];
    }

    public function getTableItems(): Collection
    {
        return $this->devices->map(function ($device) {
            return [
                $device->name,
                $device->brand,
                $device->type,
                '<code>'.$device->ipAddress.'</code>',
                $device->isRunning() ? '<span class="font-bold text-green-600">🟢 Running</span>' : '<span class="font-bold text-red-600">🔴 Down</span>',
                $device->createdAt->diffForHumans(),
            ];
        });
    }

    public function filter(DeviceRepository $deviceRepository)
    {
        $this->devices = $deviceRepository->getDevices()->filter(function ($device) {
            $brand = Str::lower($device->brand);
            $type = Str::lower($device->type);

            return (
                ($this->filters['brands']['cisco'] ? $brand === 'cisco' : false) ||
                ($this->filters['brands']['mikrotik'] ? $brand === 'mikrotik' : false) ||
                ($this->filters['brands']['juniper'] ? $brand === 'juniper' : false)
            ) && (
                ($this->filters['types']['router'] ? $type === 'router' : false) ||
                ($this->filters['types']['access_point'] ? $type === 'access_point' : false) ||
                ($this->filters['types']['programmable_switch'] ? $type === 'programmable_switch' : false)
            ) && (
                ($this->filters['statuses']['running'] ? $device->isRunning() : false) ||
                ($this->filters['statuses']['down'] ? ! $device->isRunning() : false)
            );
        });

        $this->dispatch('table-item-updated', items: $this->getTableItems());
    }

    #[On('table-exported')]
    public function export(DeviceRepository $deviceRepository, string $fileName): Response|BinaryFileResponse
    {
        $this->filter($deviceRepository);

        return (new DeviceExport($this->devices))->download($fileName);
    }

    #[On('table-item-deleted')]
    public function delete(DeviceRepository $deviceRepository, string $device)
    {
        $deviceRepository->deleteDevice($device);
        $this->devices = $deviceRepository->getDevices();
    }

    public function mount(DeviceRepository $deviceRepository)
    {
        $this->filter($deviceRepository);
    }

    public function render()
    {
        return view('livewire.device.index', [
            'tableData' => $this->getTableData(),
        ]);
    }
}
