<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use QueueSizeCheck\QueueSizeCheck;
use Spatie\CpuLoadHealthCheck\CpuLoadCheck;
use Spatie\Health\Checks\Checks\CacheCheck;
use Spatie\Health\Checks\Checks\DatabaseCheck;
use Spatie\Health\Checks\Checks\DatabaseConnectionCountCheck;
use Spatie\Health\Checks\Checks\DatabaseTableSizeCheck;
use Spatie\Health\Checks\Checks\DebugModeCheck;
use Spatie\Health\Checks\Checks\EnvironmentCheck;
use Spatie\Health\Checks\Checks\FlareErrorOccurrenceCountCheck;
use Spatie\Health\Checks\Checks\HorizonCheck;
use Spatie\Health\Checks\Checks\PingCheck;
use Spatie\Health\Checks\Checks\QueueCheck;
use Spatie\Health\Checks\Checks\RedisCheck;
use Spatie\Health\Checks\Checks\UsedDiskSpaceCheck;
use Spatie\Health\Facades\Health;
use Spatie\SecurityAdvisoriesHealthCheck\SecurityAdvisoriesCheck;

class HealthCheckServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Health::checks([
            CacheCheck::new(),
            CpuLoadCheck::new(),
            DatabaseCheck::new(),
            DatabaseConnectionCountCheck::new(),
            DatabaseTableSizeCheck::new(),
            DebugModeCheck::new(),
            EnvironmentCheck::new(),
            FlareErrorOccurrenceCountCheck::new(),
            HorizonCheck::new(),
            PingCheck::new()->url(config('app.url')),
            QueueCheck::new(),
            QueueSizeCheck::new(),
            RedisCheck::new(),
            SecurityAdvisoriesCheck::new(),
            UsedDiskSpaceCheck::new(),
            // ScheduleCheck::new(),
            // SslCertificationValidCheck::new()->url(config('app.url')),
            // BackupsCheck::new(),
            // OctaneCheck::new(),
        ]);
    }
}
