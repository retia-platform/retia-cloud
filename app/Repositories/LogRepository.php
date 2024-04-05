<?php

namespace App\Repositories;

use App\Models\Log;
use Illuminate\Support\Collection;

class LogRepository
{
    private ?Collection $cachedMonthlyLogs = null;

    private ?Collection $cachedWeeklyLogs = null;

    /**
     * Monthly Logs
     * --------------------
     */
    public function getMonthlyLogs(
        int $amount = 0, // 0 means all
    ): Collection {
        if (! empty($this->cachedMonthlyLogs)) {
            return $this->cachedMonthlyLogs;
        }

        return $this->cachedMonthlyLogs = Log::all(now()->startOfMonth(), now()->endOfMonth(), $amount);
    }

    public function getMonthlyLogAmount(): int
    {
        return $this->getMonthlyLogs()->count();
    }

    public function getMonthlyErrorLogAmount(): int
    {
        return $this->getMonthlyLogs()->filter(fn (Log $log) => $log->isErrorSeverity())->count();
    }

    /**
     * Weekly Logs
     * --------------------
     */
    public function getWeeklyLogs(
        int $amount = 0, // 0 means all
    ): Collection {
        if (! empty($this->cachedWeeklyLogs)) {
            return $this->cachedWeeklyLogs;
        }

        return $this->cachedWeeklyLogs = Log::all(now()->startOfWeek(), now()->endOfWeek(), $amount);
    }

    public function getWeeklyLogAmount(): int
    {
        return $this->getWeeklyLogs()->count();
    }

    public function getWeeklyErrorLogAmount(): int
    {
        return $this->getWeeklyLogs()->filter(fn (Log $log) => $log->isErrorSeverity())->count();
    }
}
