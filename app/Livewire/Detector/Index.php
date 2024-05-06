<?php

namespace App\Livewire\Detector;

use App\Enums\Device\Brand;
use App\Enums\Device\Status;
use App\Enums\Device\Type;
use App\Exports\DetectorExport;
use App\Interfaces\TableComponent;
use App\Models\Detector;
use App\Repositories\DetectorRepository;
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

    private Collection $detectors;

    public static function getTableColumns(): array
    {
        return [
            'Detector',
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
            'title' => 'Detector',
            'detailRoute' => 'detectors.detail',
            'storeRoute' => 'detectors.store',
            'updateRoute' => 'detectors.update',
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
        return $this->detectors->map(function (Detector $detector) {
            return [
                $detector->getId(),
                $detector->name,
                $detector->brand,
                $detector->type,
                '<code>'.$detector->ipAddress.'</code>',
                $detector->isRunning()
                    ? '<span class="font-bold text-green-600">🟢 Running</span>'
                    : '<span class="font-bold text-red-600">🔴 Down</span>',
                $detector->createdAt->diffForHumans(),
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

    public function filter(DetectorRepository $detectorRepository)
    {
        $this->detectors = $detectorRepository
            ->getDetectors()
            ->filter(function (Detector $detector) {
                $brand = Str::lower($detector->brand);
                $type = Str::lower($detector->type);

                return (($this->filters['brands']['cisco']
                    ? $brand === 'cisco'
                    : false) ||
                    ($this->filters['brands']['mikrotik']
                        ? $brand === 'mikrotik'
                        : false) ||
                    ($this->filters['brands']['juniper']
                        ? $brand === 'juniper'
                        : false)) &&
                    (($this->filters['types']['router']
                        ? $type === 'router'
                        : false) ||
                        ($this->filters['types']['access_point']
                            ? $type === 'access_point'
                            : false) ||
                        ($this->filters['types']['programmable_switch']
                            ? $type === 'programmable_switch'
                            : false)) &&
                    (($this->filters['statuses']['running']
                        ? $detector->isRunning()
                        : false) ||
                        ($this->filters['statuses']['down']
                            ? ! $detector->isRunning()
                            : false));
            });

        $this->dispatch('table-item-updated', items: $this->getTableItems());
    }

    #[On('table-exported')]
    public function export(
        DetectorRepository $detectorRepository,
        string $fileName
    ): Response|BinaryFileResponse {
        $this->filter($detectorRepository);

        return (new DetectorExport($this->detectors))->download($fileName);
    }

    #[On('table-item-deleted')]
    public function delete(
        DetectorRepository $detectorRepository,
        string $detector
    ) {
        $detectorRepository->deleteDetector($detector);
        $this->detectors = $this->filter($detectorRepository);
    }

    public function mount(DetectorRepository $detectorRepository)
    {
        $this->populateFilters($this->filterEnums);
        $this->activateDefaultFilters();
        $this->filter($detectorRepository);
    }

    public function render()
    {
        return view('livewire.detector.index', [
            'tableData' => $this->getTableData(),
        ]);
    }
}
