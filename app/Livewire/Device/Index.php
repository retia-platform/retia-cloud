<?php

namespace App\Livewire\Device;

use App\Enums\Device\Brand;
use App\Enums\Device\Status;
use App\Enums\Device\Type;
use App\Exports\DeviceExport;
use App\Interfaces\TableComponent;
use App\Repositories\DeviceRepository;
use App\Traits\HasFilterFromEnum;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class Index extends Component implements TableComponent
{
    use HasFilterFromEnum;

    public array $filterEnums = [
        'brands' => Brand::class,
        'types' => Type::class,
        'statuses' => Status::class,
    ];

    public array $filters;

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
            'storeRoute' => 'devices.store1',
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

    public function activateDefaultFilters()
    {
        $this->filters['brands']['cisco'] = true;
        $this->filters['types']['router'] = true;
        $this->filters['statuses']['running'] = true;
        $this->filters['statuses']['down'] = true;
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
        $this->devices = $this->filter($deviceRepository);
    }

    public function mount(DeviceRepository $deviceRepository)
    {
        $this->populateFilters($this->filterEnums);
        $this->activateDefaultFilters();
        $this->filter($deviceRepository);
    }

    public function render()
    {
        return view('livewire.device.index', [
            'tableData' => $this->getTableData(),
        ]);
    }
}
