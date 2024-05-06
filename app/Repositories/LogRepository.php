<?php

namespace App\Repositories;

use App\Helpers\Vault;
use App\Models\Log;
use Illuminate\Support\Collection;

class LogRepository
{
    /**
     * Monthly Logs
     * --------------------
     */
    public function getMonthlyLogs(
        int $amount = 0, // 0 means all
        bool $fresh = false,
    ): Collection {
        if (! $fresh && ! empty($cache = Vault::get('getMonthlyLogs'))) {
            return $cache;
        }

        $monthlyLogs = Log::all(now()->startOfMonth(), now()->endOfMonth(), $amount);

        Vault::set('getMonthlyLogs', $monthlyLogs);

        return $monthlyLogs;
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
        bool $fresh = false,
    ): Collection {
        if (! $fresh && ! empty($cache = Vault::get('getWeeklyLogs'))) {
            return $cache;
        }

        $weeklyLogs = Log::all(now()->startOfWeek(), now()->endOfWeek(), $amount);

        Vault::set('getWeeklyLogs', $weeklyLogs);

        return $weeklyLogs;
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
