<?php

namespace App\Livewire\Device;

use App\Repositories\DeviceRepository;
use Livewire\Component;

class Index extends Component
{
    public array $tableData = [
        'title' => 'Device',
        'columns' => [],
        'items' => [],
        'detailRoute' => 'devices.detail',
        'storeRoute' => 'devices.store',
        'updateRoute' => 'devices.update',
        'actionable' => true,
        'deleteable' => true,
        'exportable' => true,
        'paginate' => true,
    ];

    public function mount(DeviceRepository $deviceRepository)
    {
        $this->tableData['columns'] = [
            'Name',
            'Brand',
            'Type',
            'IP Address',
            'Status',
        ];

        foreach ($deviceRepository->getAllDevices() as $device) {
            $this->tableData['items'][] = [
                $device['hostname'] ?? 'Unknown',
                'Cisco',
                'Router',
                '<code>'.($device['mgmt_ipaddr'] ?? 'unknown').'</code>',
                '<span class="text-green-600">🟢 Running</span>',
            ];
        }
    }

    public function render()
    {
        return view('livewire.device.index');
    }
}
