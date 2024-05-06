<?php

namespace App\Repositories;

use App\Helpers\Vault;
use App\Models\Detector;
use Illuminate\Support\Collection;

class DetectorRepository
{
    /**
     * Detectors
     * --------------------
     */
    public function getDetectors(int $amount = 0, bool $fresh = false): Collection
    {
        if (! $fresh && ! empty($cache = Vault::get('getDetectors'))) {
            return $cache;
        }

        $detectors = Detector::all(amount: $amount);

        Vault::set('getDetectors', $detectors);

        return $detectors;
    }

    public function getDetector(string $name, bool $fresh = false): ?Detector
    {
        if (! $fresh && ! empty($cache = Vault::get('getDetector')) && $cache->name === $name) {
            return $cache;
        }

        $detector = Detector::find($name);

        Vault::set('getDetector', $detector);

        return $detector;
    }

    public function getDetectorAmount(): int
    {
        return $this->getDetectors()->count();
    }

    public function getRunningDetectorAmount(): int
    {
        return $this->getDetectors()->filter(fn ($detector) => $detector->isRunning())->count();
    }

    public function getRunningDetectorPercentage(): int
    {
        if ($this->getRunningDetectorAmount() <= 0 || $this->getDetectorAmount() <= 0) {
            return 0;
        }

        return $this->getRunningDetectorAmount() / $this->getDetectorAmount() * 100;
    }

    public function createDetector(array $data): ?Detector
    {
        return Detector::add($data);
    }

    public function updateDetector(string $detector, array $data): Detector
    {
        $detector = $this->getDetector($detector, fresh: true);

        $detector->update($data);

        return $detector->fresh();
    }

    public function deleteDetector(string $detector): void
    {
        $this->getDetector($detector, fresh: true)->delete();
    }
}
