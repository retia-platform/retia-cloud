<?php

namespace App\Helpers;

use Illuminate\Support\Str;

abstract class Theme
{
    private static function getCache(string $key): string
    {
        return (string) cache()->get($key.'-user-'.(auth()?->user()?->id ?? 0));
    }

    private static function setCache(string $key, string $value)
    {
        cache()->put($key.'-user-'.(auth()?->user()?->id ?? 0), Str::lower($value));
    }

    public static function isLight(): bool
    {
        if (empty($theme = self::getCache('theme'))) {
            return true;
        }

        return $theme === 'light';
    }

    public static function isDark(): bool
    {
        return ! self::isLight();
    }

    public static function setLight()
    {
        self::setCache('theme', 'light');
    }

    public static function setDark()
    {
        self::setCache('theme', 'dark');
    }

    public static function getPrimaryColor(): string
    {
        if (empty($primaryColor = self::getCache('primary-color'))) {
            return 'gray';
        }

        return $primaryColor;
    }

    public static function setPrimaryColor(string $color)
    {
        self::setCache('primary-color', $color);
    }

    public static function getSecondaryColor(): string
    {
        if (empty($secondaryColor = self::getCache('secondary-color'))) {
            return 'gray';
        }

        return $secondaryColor;
    }

    public static function setSecondaryColor(string $color)
    {
        self::setCache('secondary-color', $color);
    }
}
