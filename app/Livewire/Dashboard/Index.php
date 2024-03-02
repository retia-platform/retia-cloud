<?php

namespace App\Livewire\Dashboard;

use App\Repositories\DeviceRepository;
use App\Repositories\MonitoringRepository;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Index extends Component
{
    public array $buildInformation;

    public array $inThroughputs;

    public array $outThroughputs;

    public array $devices;

    public bool $showingPrometheusBuildInformationModal = false;

    public bool $showingAlertManagerBuildInformationModal = false;

    public bool $showingSnmpExporterBuildInformationModal = false;

    public function mount(
        MonitoringRepository $monitoringRepository,
        DeviceRepository $deviceRepository,
    ) {
        $this->buildInformation = $monitoringRepository->getBuildInformation();

        $this->inThroughputs = $monitoringRepository->getInThroughputs(amount: 10);

        $this->outThroughputs = $monitoringRepository->getOutThroughputs(amount: 10);

        $this->devices = $deviceRepository->getAllDevices(amount: 10);
    }

    public function render()
    {
        $inThroughputChartModel = (new LineChartModel())
            ->setAnimated(true)
            ->setColors(['#000000'])
            ->setSmoothCurve()
            ->multiLine()
            ->withoutLegend();

        $outThroughputChartModel = (new LineChartModel())
            ->setAnimated(true)
            ->setColors(['#000000'])
            ->setSmoothCurve()
            ->multiLine()
            ->withoutLegend();

        foreach ($this->inThroughputs as $inThroughput) {
            $inThroughputChartModel->addSeriesPoint('Default', Carbon::parse($inThroughput[0])->format('H:i'), $inThroughput[1]);
        }

        foreach ($this->outThroughputs as $outThroughput) {
            $outThroughputChartModel->addSeriesPoint('Default', Carbon::parse($outThroughput[0])->format('H:i'), $outThroughput[1]);
        }

        return view('livewire.dashboard.index', [
            'inThroughputChartModel' => $inThroughputChartModel,
            'outThroughputChartModel' => $outThroughputChartModel,
        ]);
    }
}
