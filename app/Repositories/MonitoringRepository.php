<?php

namespace App\Repositories;

use App\Helpers\Vault;
use App\Traits\Requestable;
use Illuminate\Support\Collection;

class MonitoringRepository
{
    use Requestable;

    public function getTimeFilterQueryParams(int $timeRange): string
    {
        if (! empty($cache = Vault::get('getTimeFilterQueryParams'))) {
            return $cache;
        }

        $start = now()->subHours($timeRange)->format('Y-m-d').'T'.now()->subHours($timeRange)->format('H:i:s');
        $end = now()->format('Y-m-d').'T'.now()->format('H:i:s');
        $filter = "?start_time=$start%2B07:00&end_time=$end%2B07:00";

        Vault::set('getTimeFilterQueryParams', $filter);

        return $filter;
    }

    public function getInThroughputs(
        string $device,
        string $interface,
        int $timeRange = 12, // hours
        int $amount = 10,
    ): Collection {
        if (
            ! empty($cache = Vault::get('inThroughputs'))
            && ! empty($cachedDevice = Vault::get('inThroughputDevice'))
            && ! empty($cachedInterface = Vault::get('inThroughputInterface'))
            && $cachedDevice === $device
            && $cachedInterface === $interface
        ) {
            return $cache;
        }

        $response = $this->withToken()->get(config('services.retia_api.url')."device/$device/interface/$interface/in_throughput".$this->getTimeFilterQueryParams($timeRange));

        $this->authorize($response);

        $response = $response->ok() ? $response->json() : [];

        if ($amount > 0) {
            $result = array_slice($response, -$amount, $amount);
        }

        for ($i = 0; $i < count($result); $i++) {
            $result[$i][1] = (int) ceil((float) $result[$i][1]);
        }

        Vault::set('inThroughputs', $inThroughputs = collect($result));
        Vault::set('inThroughputDevice', $device);
        Vault::set('inThroughputInterface', $interface);

        return $inThroughputs;
    }

    public function getOutThroughputs(
        string $device,
        string $interface,
        int $timeRange = 12, // hours
        int $amount = 10,
    ): Collection {
        if (
            ! empty($cache = Vault::get('outThroughputDevice'))
            && ! empty($cachedDevice = Vault::get('outThroughputInterface'))
            && ! empty($cachedInterface = Vault::get('outThroughputs'))
            && $cachedDevice === $device
            && $cachedInterface === $interface
        ) {
            return $cache;
        }

        $response = $this->withToken()
            ->get(config('services.retia_api.url')."device/$device/interface/$interface/out_throughput".$this->getTimeFilterQueryParams($timeRange));

        $this->authorize($response);

        $response = $response->ok() ? $response->json() : [];

        if ($amount > 0) {
            $result = array_slice($response, -$amount, $amount);
        }

        for ($i = 0; $i < count($result); $i++) {
            $result[$i][1] = (int) ceil((float) $result[$i][1]);
        }

        Vault::set('outThroughputs', $outThroughputs = collect($result));
        Vault::set('outThroughputDevice', $device);
        Vault::set('outThroughputInterface', $interface);

        return $outThroughputs;
    }

    public function getBuildInformation(): Collection
    {
        if (! empty($cache = Vault::get('buildInformation'))) {
            return $cache;
        }

        $buildInformation = $this->get('monitoring/buildinfo');

        Vault::set('buildInformation', $buildInformation);

        return $buildInformation;
    }
}
