<?php

namespace App\Livewire\Detector;

use App\Repositories\DetectorRepository;
use Livewire\Component;

class Index extends Component
{
    public array $tableData = [
        'title' => 'Detector',
        'columns' => [],
        'items' => [],
        'detailRoute' => 'detectors.detail',
        'storeRoute' => 'detectors.store',
        'updateRoute' => 'detectors.update',
        'actionable' => true,
        'deleteable' => true,
        'exportable' => true,
        'paginate' => true,
    ];

    public function mount(DetectorRepository $detectorRepository)
    {
        $this->tableData['columns'] = [
            'Name',
            'Brand',
            'Type',
            'IP Address',
            'Status',
        ];

        foreach ($detectorRepository->getAllDetectors() as $detector) {
            $this->tableData['items'][] = [
                $detector['hostname'],
                $detector['brand'],
                $detector['device_type'],
                '<code>'.$detector['mgmt_ipaddr'].'</code>',
                $detector['status'] === 'up' ? '<span class="font-bold text-green-600">🟢 Running</span>' : '<span class="font-bold text-red-600">🔴 Down</span>',
            ];
        }
    }

    public function render()
    {
        return view('livewire.detector.index');
    }
}
