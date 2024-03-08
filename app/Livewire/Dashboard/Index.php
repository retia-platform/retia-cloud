<?php

namespace App\Livewire\Dashboard;

use App\Repositories\DetectorRepository;
use App\Repositories\DeviceRepository;
use App\Repositories\LogRepository;
use App\Repositories\MonitoringRepository;
use App\Traits\Chartable;
use App\Traits\HasDependencyInformationModal;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Livewire\Component;

class Index extends Component
{
    use Chartable;
    use HasDependencyInformationModal;

    public Collection $buildInformation;

    public Collection $inThroughputs;

    public Collection $outThroughputs;

    public Collection $devices;

    public Collection $interfaces;

    public int $deviceAmount;

    public int $runningDeviceAmount;

    public int $runningDevicePercentage;

    public string $runningDeviceStatusColor = 'gray';

    public int $detectorAmount;

    public int $runningDetectorAmount;

    public int $runningDetectorPercentage;

    public string $runningDetectorStatusColor = 'gray';

    public int $monthlyLogAmount;

    public int $monthlyErrorLogAmount;

    public string $monthlyErrorLogStatusColor = 'gray';

    public bool $showingPrometheusBuildInformationModal = false;

    public bool $showingAlertManagerBuildInformationModal = false;

    public bool $showingSnmpExporterBuildInformationModal = false;

    public string $inThroughputDevice = '';

    public string $inThroughputInterface = '';

    public string $outThroughputDevice = '';

    public string $outThroughputInterface = '';

    public function updateInThroughputs(
        MonitoringRepository $monitoringRepository,
    ) {
        if (empty($this->devices) || empty($this->interfaces)) {
            return;
        }

        $this->inThroughputs = $monitoringRepository->getInThroughputs(
            device: $this->inThroughputDevice,
            interface: $this->inThroughputInterface,
            amount: 10,
        );
    }

    public function updateOutThroughputs(
        MonitoringRepository $monitoringRepository,
    ) {
        if (empty($this->devices) || empty($this->interfaces)) {
            return;
        }

        $this->outThroughputs = $monitoringRepository->getOutThroughputs(
            device: $this->outThroughputDevice,
            interface: $this->outThroughputInterface,
            amount: 10,
        );
    }

    public function mount(
        MonitoringRepository $monitoringRepository,
        DeviceRepository $deviceRepository,
        DetectorRepository $detectorRepository,
        LogRepository $logRepository,
    ) {
        $this->buildInformation = $monitoringRepository->getBuildInformation();

        $this->devices = $deviceRepository->getDevices(amount: 10)->map(fn ($device) => $device->toArray());

        $this->deviceAmount = $deviceRepository->getDeviceAmount();

        $this->runningDeviceAmount = $deviceRepository->getRunningDeviceAmount();

        $this->runningDevicePercentage = $deviceRepository->getRunningDevicePercentage();

        $this->runningDeviceStatusColor = match (true) {
            $this->runningDevicePercentage >= 80 => 'green',
            $this->runningDevicePercentage >= 60 => 'yellow',
            default => 'red',
        };

        $this->detectorAmount = $detectorRepository->getDetectorAmount();

        $this->runningDetectorAmount = $detectorRepository->getRunningDetectorAmount();

        $this->runningDetectorPercentage = $detectorRepository->getRunningDetectorPercentage();

        $this->runningDetectorStatusColor = match (true) {
            $this->runningDetectorPercentage >= 80 => 'green',
            $this->runningDetectorPercentage >= 60 => 'yellow',
            default => 'red',
        };

        $this->monthlyLogAmount = $logRepository->getMonthlyLogAmount();

        $this->monthlyErrorLogAmount = $logRepository->getMonthlyErrorLogAmount();

        $this->monthlyErrorLogStatusColor = match (true) {
            $this->monthlyErrorLogAmount <= 0 => 'green',
            default => 'red',
        };

        if (! empty($this->devices)) {
            $device = $deviceRepository->getDevice($this->devices->first()['name']);
            $this->interfaces = $deviceRepository->getInterfaces($device)->map(fn ($interface) => $interface->toArray());

            $device = $this->devices->first();
            $interface = $this->interfaces->first();

            $this->inThroughputDevice = $device['name'];
            $this->inThroughputInterface = $interface['name'];
            $this->outThroughputDevice = $device['name'];
            $this->outThroughputInterface = $interface['name'];

            $this->updateInThroughputs($monitoringRepository);
            $this->updateOutThroughputs($monitoringRepository);
        }
    }

    public function render()
    {
        $inThroughputChartModel = $this->generateLineChart();

        $outThroughputChartModel = $this->generateLineChart();

        foreach ($this->inThroughputs as $inThroughput) {
            $inThroughputChartModel->addSeriesPoint(0, Carbon::parse($inThroughput[0])->format('H:i'), $inThroughput[1]);
        }

        foreach ($this->outThroughputs as $outThroughput) {
            $outThroughputChartModel->addSeriesPoint(0, Carbon::parse($outThroughput[0])->format('H:i'), $outThroughput[1]);
        }

        return view('livewire.dashboard.index', [
            'inThroughputChartModel' => $inThroughputChartModel,
            'outThroughputChartModel' => $outThroughputChartModel,
        ]);
    }
}
