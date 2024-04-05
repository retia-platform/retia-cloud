<?php

namespace App\Repositories;

use App\Models\Detector;
use Illuminate\Support\Collection;

class DetectorRepository
{
    private ?Detector $cachedDetector = null;

    private ?Collection $cachedDetectors = null;

    /**
     * Detectors
     * --------------------
     */
    public function getDetectors(int $amount = 0): Collection
    {
        if (! empty($this->cachedDetectors)) {
            return $this->cachedDetectors;
        }

        return $this->cachedDetectors = Detector::all(amount: $amount);
    }

    public function getDetector(string $name): ?Detector
    {
        if ($name === $this->cachedDetector?->name) {
            return $this->cachedDetector;
        }

        return $this->cachedDetector = Detector::find($name);
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
        return Detector::create($data);
    }

    public function updateDetector(string $detector, array $data): Detector
    {
        $detector = $this->getDetector($detector);

        $detector->update($data);

        return $detector->fresh();
    }

    public function deleteDetector(string $detector): void
    {
        $this->getDetector($detector)->delete();
    }
}
