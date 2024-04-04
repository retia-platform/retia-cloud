<?php

namespace App\Enums;

enum DeviceStatus: string
{
    case RUNNING = 'running';
    case DOWN = 'down';

    public static function toArray(): array
    {
        return [
            self::RUNNING,
            self::DOWN,
        ];
    }

    public static function labels(): array
    {
        return [
            self::RUNNING->label(),
            self::DOWN->label(),
        ];
    }

    public static function values(): array
    {
        return [
            self::RUNNING->value,
            self::DOWN->value,
        ];
    }

    public static function labelAndValues(): array
    {
        return [
            ['label' => self::RUNNING->label(), 'value' => self::RUNNING->value],
            ['label' => self::DOWN->label(), 'value' => self::DOWN->value],
        ];
    }

    public function label(): string
    {
        return match ($this) {
            self::RUNNING => 'Running',
            self::DOWN => 'Down',
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::RUNNING => 'The device is running',
            self::DOWN => 'The device is down',
        };
    }
}
