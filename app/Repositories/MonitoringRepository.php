<?php

namespace App\Repositories;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class MonitoringRepository
{
    public function getDate(): string
    {
        return Carbon::now()->format('Y-m-d');
    }

    public function getDefaultTimeRange(): int
    {
        return 12; // hours
    }

    public function getStartTime(int $timeRange): string
    {
        if ($timeRange < 1) {
            $timeRange = self::getDefaultTimeRange();
        }

        return Carbon::now()->subHours($timeRange)->format('H:i:s');
    }

    public function getEndTime(): string
    {
        return Carbon::now()->format('H:i:s');
    }

    public function getTimeFilterQueryParams(int $timeRange): string
    {
        $date = self::getDate();
        $start = $date.'T'.self::getStartTime($timeRange);
        $end = $date.'T'.self::getEndTime();

        return "?start_time=$start%2B07:00&end_time=$end%2B07:00";
    }

    public function getInThroughputs(
        string $device = 'R-A',
        string $interface = 'GigabitEthernet1',
        int $timeRange = 12, // hours
        int $amount = 32,
        int $retries = 0,
    ): array {
        $response = Http::withToken(auth()->user()?->retia_api_token)
            ->get(config('services.retia_api.url')."device/$device/interface/$interface/in_throughput".self::getTimeFilterQueryParams($timeRange));

        if ($response->status() === 401 && $retries < config('app.max_request_retries')) {
            auth()->user()?->refreshRetiaApiToken();

            return $this->getInThroughputs($device, $interface, $timeRange, $amount, $retries++);
        }

        $result = $response->status() === 200 ? $response->json() : [];

        if ($amount > 0) {
            $result = array_slice($result, -$amount, $amount);
        }

        for ($i = 0; $i < count($result); $i++) {
            $result[$i][1] = round((float) $result[$i][1], 2);
        }

        return $result;
    }

    public function getOutThroughputs(
        string $device = 'R-A',
        string $interface = 'GigabitEthernet1',
        int $timeRange = 12, // hours
        int $amount = 32,
        int $retries = 0,
    ): array {
        $response = Http::withToken(auth()->user()?->retia_api_token)
            ->get(config('services.retia_api.url')."device/$device/interface/$interface/out_throughput".self::getTimeFilterQueryParams($timeRange));

        if ($response->status() === 401 && $retries < config('app.max_request_retries')) {
            auth()->user()?->refreshRetiaApiToken();

            return $this->getOutThroughputs($device, $interface, $timeRange, $amount, $retries++);
        }

        $result = $response->status() === 200 ? $response->json() : [];

        if ($amount > 0) {
            $result = array_slice($result, -$amount, $amount);
        }

        for ($i = 0; $i < count($result); $i++) {
            $result[$i][1] = round((float) $result[$i][1], 2);
        }

        return $result;
    }

    public function getBuildInformation(int $retries = 0): array
    {
        $response = Http::withToken(auth()->user()?->retia_api_token)
            ->get(config('services.retia_api.url').'monitoring/buildinfo');

        if ($response->status() === 401 && $retries < config('app.max_request_retries')) {
            auth()->user()?->refreshRetiaApiToken();

            return $this->getBuildInformation($retries++);
        }

        if ($response->status() !== 200) {
            return [];
        }

        return $response->json();
    }
}
