<?php

namespace App\Livewire\Log;

use App\Enums\LogCategory;
use App\Enums\LogInstance;
use App\Enums\LogSeverity;
use App\Models\Log;
use App\Traits\HasSessionError;
use Livewire\Component;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Detail extends Component
{
    use HasSessionError;

    public Log $log;

    public function mount()
    {
        $this->log = Log::make(request()->input('id'));

        if (empty($this->log)) {
            throw new NotFoundHttpException();
        }

        $this->log->severity = match (true) {
            $this->log->isInfoSeverity() => LogSeverity::INFO->badge(),
            $this->log->isWarningSeverity() => LogSeverity::WARNING->badge(),
            $this->log->isErrorSeverity() => LogSeverity::ERROR->badge(),
            default => LogSeverity::UNKNOWN->badge(),
        };

        $this->log->category = match (true) {
            $this->log->isDeviceCategory() => LogCategory::DEVICE->badge(),
            $this->log->isDetectorCategory() => LogCategory::DETECTOR->badge(),
            $this->log->isInterfaceCategory() => LogCategory::INTERFACE->badge(),
            $this->log->isAclCategory() => LogCategory::ACL->badge(),
            $this->log->isStaticRouteCategory() => LogCategory::STATIC_ROUTE->badge(),
            $this->log->isOspfCategory() => LogCategory::OSPF->badge(),
            default => LogCategory::UNKNOWN->badge(),
        };

        $this->log->instance = match (true) {
            $this->log->isEngineInstance() => LogInstance::ENGINE->badge($this->log),
            $this->log->isDeviceInstance() => LogInstance::DEVICE->badge($this->log),
            default => LogInstance::UNKNOWN->badge($this->log),
        };
    }

    public function render()
    {
        return view('livewire.log.detail');
    }
}
