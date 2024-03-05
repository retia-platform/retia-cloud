<?php

namespace App\Repositories;

use App\Traits\Requestable;
use Illuminate\Support\Collection;

class MonitoringRepository
{
    use Requestable;

    private ?Collection $cachedInThroughputs = null;

    private ?string $cachedInThroughputDevice = null;

    private ?string $cachedInThroughputInterface = null;

    private ?Collection $cachedOutThroughputs = null;

    private ?string $cachedOutThroughputDevice = null;

    private ?string $cachedOutThroughputInterface = null;

    private ?Collection $cachedBuildInformation = null;

    public function getTimeFilterQueryParams(int $timeRange): string
    {
        $start = now()->subHours($timeRange)->format('Y-m-d').'T'.now()->subHours($timeRange)->format('H:i:s');
        $end = now()->format('Y-m-d').'T'.now()->format('H:i:s');

        return "?start_time=$start%2B07:00&end_time=$end%2B07:00";
    }

    public function getInThroughputs(
        string $device,
        string $interface,
        int $timeRange = 12, // hours
        int $amount = 10,
    ): Collection {
        if (
            ! empty($this->cachedInThroughputs)
            && $this->cachedInThroughputDevice === $device
            && $this->cachedInThroughputInterface === $interface
        ) {
            return $this->cachedInThroughputs;
        }

        $response = $this->withToken()
            ->get(config('services.retia_api.url')."device/$device/interface/$interface/in_throughput".$this->getTimeFilterQueryParams($timeRange));

        $this->authorize($response);

        $response = $response->ok() ? $response->json() : [];

        if ($amount > 0) {
            $result = array_slice($response, -$amount, $amount);
        }

        for ($i = 0; $i < count($result); $i++) {
            $result[$i][1] = (int) ceil((float) $result[$i][1]);
        }

        $this->cachedInThroughputDevice === $device;

        $this->cachedInThroughputInterface === $interface;

        return $this->cachedInThroughputs = collect($result);
    }

    public function getOutThroughputs(
        string $device,
        string $interface,
        int $timeRange = 12, // hours
        int $amount = 10,
    ): Collection {
        if (
            ! empty($this->cachedOutThroughputs)
            && $this->cachedOutThroughputDevice === $device
            && $this->cachedOutThroughputInterface === $interface
        ) {
            return $this->cachedInThroughputs;
        }

        $response = $this->withToken()
            ->get(config('services.retia_api.url')."device/$device/interface/$interface/out_throughput".$this->getTimeFilterQueryParams($timeRange));

        $this->authorize($response);

        $response = $response->ok() ? $response->json() : [];

        if ($amount > 0) {
            $result = array_slice($response, -$amount, $amount);
        }

        if ($amount > 0) {
            $result = array_slice($response, -$amount, $amount);
        }

        for ($i = 0; $i < count($result); $i++) {
            $result[$i][1] = (int) ceil((float) $result[$i][1]);
        }

        $this->cachedOutThroughputDevice === $device;

        $this->cachedOutThroughputInterface === $interface;

        return $this->cachedOutThroughputs = collect($result);
    }

    public function getBuildInformation(): Collection
    {
        if (! empty($this->cachedBuildInformation)) {
            return $this->cachedBuildInformation;
        }

        return $this->cachedBuildInformation = $this->get('monitoring/buildinfo');
    }
}
