<?php

namespace App\Helpers;

abstract class Vault
{
    public static function expirationMinutes(): int
    {
        return config('services.retia_api.cache_invalidate_minutes');
    }

    public static function timeID(string $key): string
    {
        $user = auth()->user();

        if (empty($user)) {
            return 'default-time';
        }

        return "$key-time-{$user->id}";
    }

    public static function dataID(string $key): string
    {
        $user = auth()->user();

        if (empty($user)) {
            return 'default-data';
        }

        return "$key-data-{$user->id}";
    }

    public static function remove(string $key): void
    {
        cache()->forget(self::timeID($key));
        cache()->forget(self::dataID($key));
    }

    public static function set(string $key, $data): void
    {
        self::remove($key);
        cache()->put(self::timeID($key), now());
        cache()->put(self::dataID($key), $data);
    }

    public static function get(string $key)
    {
        $time = cache()->get(self::timeID($key));
        $data = cache()->get(self::dataID($key));

        if (empty($time) || empty($data) || now()->diffInMinutes($time) > 5) {
            self::remove($key);

            return null;
        }

        return $data;
    }
}
