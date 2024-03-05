<?php

namespace App\Traits;

trait Resourceable
{
    public static function path(): string
    {
        return self::$path ?? '';
    }

    public static function getResourceName(): string
    {
        return preg_replace('/([a-z])([A-Z])/s', '$1 $2', self::class);
    }
}
