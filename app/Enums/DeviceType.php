<?php

namespace App\Enums;

enum DeviceType: string
{
    case ROUTER = 'router';
    case ACCESS_POINT = 'access_point';
    case PROGRAMMABLE_SWITCH = 'programmable_switch';

    public static function toArray(): array
    {
        return [
            self::ROUTER,
            self::ACCESS_POINT,
            self::PROGRAMMABLE_SWITCH,
        ];
    }

    public static function labels(): array
    {
        return [
            self::ROUTER->label(),
            self::ACCESS_POINT->label(),
            self::PROGRAMMABLE_SWITCH->label(),
        ];
    }

    public static function values(): array
    {
        return [
            self::ROUTER->value,
            self::ACCESS_POINT->value,
            self::PROGRAMMABLE_SWITCH->value,
        ];
    }

    public static function labelAndValues(): array
    {
        return [
            ['label' => self::ROUTER->label(), 'value' => self::ROUTER->value],
            ['label' => self::ACCESS_POINT->label(), 'value' => self::ACCESS_POINT->value],
            ['label' => self::PROGRAMMABLE_SWITCH->label(), 'value' => self::PROGRAMMABLE_SWITCH->value],
        ];
    }

    public function label(): string
    {
        return match ($this) {
            self::ROUTER => 'Router',
            self::ACCESS_POINT => 'Access Point',
            self::PROGRAMMABLE_SWITCH => 'Programmable Switch',
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::ROUTER => 'A device that forwards data packets between computer networks',
            self::ACCESS_POINT => 'A device that allows wireless devices to connect to a wired network using Wi-Fi',
            self::PROGRAMMABLE_SWITCH => 'A device that connects devices together on a computer network',
        };
    }
}
