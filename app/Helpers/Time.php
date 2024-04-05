<?php

namespace App\Helpers;

use DateTime;
use DateTimeZone;
use Illuminate\Support\Carbon;

abstract class Time
{
    public static function getTimezone(): string
    {
        return config('app.timezone');
    }

    public static function getUTCTimezone(): string
    {
        $timezone = new DateTimeZone(self::getTimezone());
        $dateTime = new DateTime('now', $timezone);
        $offsetInSeconds = $timezone->getOffset($dateTime);
        $offsetInHours = $offsetInSeconds / 3600;

        return sprintf('%+03d:00', $offsetInHours);
    }

    public static function queryParams(Carbon $from, Carbon $to): string
    {
        $timezone = urlencode(self::getUTCTimezone());
        $from = $from->format('Y-m-d\TH:i:s').$timezone;
        $to = $to->format('Y-m-d\TH:i:s').$timezone;

        return "?start_time=$from&end_time=$to";
    }
}
