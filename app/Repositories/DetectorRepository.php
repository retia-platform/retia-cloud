<?php

namespace App\Repositories;

use App\Traits\Authorizable;
use App\Traits\Formatable;
use Illuminate\Support\Collection;

class DetectorRepository
{
    use Authorizable;
    use Formatable;

    private ?Collection $cachedDetectors = null;

    public function getAllDetectors(
        int $amount = 0, // 0 means all
    ): Collection {
        if (! empty($this->cachedDetectors)) {
            return $this->cachedDetectors;
        }

        $response = $this->withToken()->get(config('services.retia_api.url').'detector');

        $this->authorize($response);

        return $this->cachedDetectors = $this->collect($response, $amount)->map(function ($detector) {
            $detector['hostname'] = $detector['hostname'] ?? 'Unknown';
            $detector['brand'] = $detector['brand'] ?? 'Unknown';
            $detector['device_type'] = $detector['device_type'] ?? 'Unknown';
            $detector['mgmt_ipaddr'] = $detector['mgmt_ipaddr'] ?? 'unknown';
            $detector['status'] = $detector['status'] ?? 'down';

            return $detector;
        });
    }

    public function getDetectorAmount(): int
    {
        return $this->getAllDetectors()->count();
    }

    public function getRunningDetectorAmount(): int
    {
        return $this->getAllDetectors()->filter(fn ($detector) => ($detector['status'] ?? '') === 'up')->count();
    }

    public function getRunningDetectorPercentage(): int
    {
        if ($this->getRunningDetectorAmount() <= 0 || $this->getDetectorAmount() <= 0) {
            return 0;
        }

        return $this->getRunningDetectorAmount() / $this->getDetectorAmount() * 100;
    }
}
