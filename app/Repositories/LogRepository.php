<?php

namespace App\Repositories;

use App\Traits\Authorizable;
use App\Traits\Formatable;
use Illuminate\Support\Collection;

class LogRepository
{
    use Authorizable;
    use Formatable;

    private ?Collection $cachedMonthlyLogs = null;

    private ?Collection $cachedWeeklyLogs = null;

    public function getMonthlyLogs(
        int $amount = 0, // 0 means all
    ): Collection {
        if (! empty($this->cachedMonthlyLogs)) {
            return $this->cachedMonthlyLogs;
        }

        $startOfMonth = now()->startOfMonth()->format('Y-m-d').'T00:00:00';
        $endOfMonth = now()->endOfMonth()->format('Y-m-d').'T23:59:59';
        $monthlyFilter = "?start_time=$startOfMonth%2B07:00&end_time=$endOfMonth%2B07:00";

        $response = $this->withToken()
            ->get(config('services.retia_api.url').'log/activity'.$monthlyFilter);

        $this->authorize($response);

        return $this->cachedMonthlyLogs = $this->collect($response, $amount);
    }

    public function getMonthlyLogAmount(): int
    {
        return $this->getMonthlyLogs()->count();
    }

    public function getMonthlyErrorLogAmount(): int
    {
        return $this->getMonthlyLogs()->filter(fn ($log) => ($log['severity'] ?? '') === 'error')->count();
    }

    public function getWeeklyLogs(
        int $amount = 0, // 0 means all
    ): Collection {
        if (! empty($this->cachedWeeklyLogs)) {
            return $this->cachedWeeklyLogs;
        }

        $startOfWeek = now()->startOfWeek()->format('Y-m-d').'T00:00:00';
        $endOfWeek = now()->endOfWeek()->format('Y-m-d').'T23:59:59';
        $weeklyFilter = "?start_time=$startOfWeek%2B07:00&end_time=$endOfWeek%2B07:00";

        $response = $this->withToken()
            ->get(config('services.retia_api.url').'log/activity'.$weeklyFilter);

        $this->authorize($response);

        return $this->cachedWeeklyLogs = $this->collect($response, $amount);
    }

    public function getWeeklyLogAmount(): int
    {
        return $this->getWeeklyLogs()->count();
    }

    public function getWeeklyErrorLogAmount(): int
    {
        return $this->getWeeklyLogs()->filter(fn ($log) => ($log['severity'] ?? '') === 'error')->count();
    }
}
