<?php

namespace App\Livewire\Log;

use App\Enums\LogCategory;
use App\Enums\LogInstance;
use App\Enums\LogSeverity;
use App\Interfaces\TableComponent;
use App\Models\Log;
use App\Repositories\LogRepository;
use App\Traits\HasFilterFromEnum;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component implements TableComponent
{
    use HasFilterFromEnum;

    public array $filterEnums = [
        'category' => LogCategory::class,
        'instance' => LogInstance::class,
        'severity' => LogSeverity::class,
    ];

    public array $filters;

    private Collection $logs;

    public static function getTableColumns(): array
    {
        return [
            'Severity',
            'Category',
            'Instance',
            'Message',
            'Logged At',
        ];
    }

    public function getTableData(): array
    {
        return [
            'title' => 'Activity Log',
            'detailRoute' => 'logs.detail',
            'actionable' => true,
            'deleteable' => false,
            'exportable' => true,
            'paginate' => true,
            'columns' => collect(self::getTableColumns()),
            'items' => $this->getTableItems(),
        ];
    }

    public function getTableItems(): Collection
    {
        return $this->logs->map(function (Log $log) {
            return [
                $log->toArray(),
                match (true) {
                    $log->isInfoSeverity() => LogSeverity::INFO->badge(),
                    $log->isWarningSeverity() => LogSeverity::WARNING->badge(),
                    $log->isErrorSeverity() => LogSeverity::ERROR->badge(),
                    default => LogSeverity::UNKNOWN->badge(),
                },
                match (true) {
                    $log->isDeviceCategory() => LogCategory::DEVICE->badge(),
                    $log->isDetectorCategory() => LogCategory::DETECTOR->badge(),
                    $log->isInterfaceCategory() => LogCategory::INTERFACE->badge(),
                    $log->isAclCategory() => LogCategory::ACL->badge(),
                    $log->isStaticRouteCategory() => LogCategory::STATIC_ROUTE->badge(),
                    $log->isOspfCategory() => LogCategory::OSPF->badge(),
                    default => LogCategory::UNKNOWN->badge(),
                },
                match (true) {
                    $log->isEngineInstance() => LogInstance::ENGINE->badge($log),
                    $log->isDeviceInstance() => LogInstance::DEVICE->badge($log),
                    default => LogInstance::UNKNOWN->badge($log),
                },
                Str::of($log->messages)->limit(28),
                $log->time->diffForHumans(),
            ];
        });
    }

    public function activateDefaultFilters()
    {
        $this->filters['time'] = 'today';
        foreach ($this->filters['category'] as $key => $value) {
            $this->filters['category'][$key] = ! $value;
        }
        foreach ($this->filters['instance'] as $key => $value) {
            $this->filters['instance'][$key] = ! $value;
        }
        foreach ($this->filters['severity'] as $key => $value) {
            $this->filters['severity'][$key] = ! $value;
        }
    }

    public function filter(LogRepository $logRepository)
    {
        $this->logs = $logRepository->getMonthlyLogs()->filter(function (Log $log) {
            $time = $log->time;

            return (
                ($this->filters['time'] === 'today' ? now()->isSameDay($time) : false) ||
                ($this->filters['time'] === 'weekly' ? now()->isSameWeek($time) : false) ||
                ($this->filters['time'] === 'monthly' ? now()->isSameMonth($time) : false)
            ) && (
                ($this->filters['category']['device'] ? $log->isDetectorCategory() : false) ||
                ($this->filters['category']['detector'] ? $log->isDeviceCategory() : false) ||
                ($this->filters['category']['interface'] ? $log->isInterfaceCategory() : false) ||
                ($this->filters['category']['acl'] ? $log->isAclCategory() : false) ||
                ($this->filters['category']['static_route'] ? $log->isStaticRouteCategory() : false) ||
                ($this->filters['category']['ospf'] ? $log->isOspfCategory() : false)
            ) && (
                ($this->filters['instance']['engine'] ? $log->isEngineInstance() : false) ||
                ($this->filters['instance']['device'] ? $log->isDeviceInstance() : false) ||
                ($this->filters['instance']['device'] ? ! $log->isEngineInstance() && ! $log->isDeviceInstance() : false)
            ) && (
                ($this->filters['severity']['info'] ? $log->isInfoSeverity() : false) ||
                ($this->filters['severity']['warning'] ? $log->isWarningSeverity() : false) ||
                ($this->filters['severity']['error'] ? $log->isErrorSeverity() : false)
            );
        });

        $this->dispatch('table-item-updated', items: $this->getTableItems());
    }

    public function mount(LogRepository $logRepository)
    {
        $this->populateFilters($this->filterEnums);
        $this->activateDefaultFilters();
        $this->filter($logRepository);
    }

    public function render()
    {
        return view('livewire.log.index', [
            'tableData' => $this->getTableData(),
        ]);
    }
}
