<?php

namespace App\Enums;

enum LogCategory: string
{
    case DEVICE = 'device';
    case DETECTOR = 'detector';
    case INTERFACE = 'interface';
    case ACL = 'acl';
    case STATIC_ROUTE = 'static route';
    case OSPF = 'ospf';
    case UNKNOWN = 'unknown';

    public static function toArray(): array
    {
        return [
            self::DEVICE,
            self::DETECTOR,
            self::INTERFACE,
            self::ACL,
            self::STATIC_ROUTE,
            self::OSPF,
            self::UNKNOWN,
        ];
    }

    public static function labels(): array
    {
        return [
            self::DEVICE->label(),
            self::DETECTOR->label(),
            self::INTERFACE->label(),
            self::ACL->label(),
            self::STATIC_ROUTE->label(),
            self::OSPF->label(),
            self::UNKNOWN->label(),
        ];
    }

    public static function values(): array
    {
        return [
            self::DEVICE->value,
            self::DETECTOR->value,
            self::INTERFACE->value,
            self::ACL->value,
            self::STATIC_ROUTE->value,
            self::OSPF->value,
            self::UNKNOWN->value,
        ];
    }

    public static function labelAndValues(): array
    {
        return [
            ['label' => self::DEVICE->label(), 'value' => self::DEVICE->value],
            ['label' => self::DETECTOR->label(), 'value' => self::DETECTOR->value],
            ['label' => self::INTERFACE->label(), 'value' => self::INTERFACE->value],
            ['label' => self::ACL->label(), 'value' => self::ACL->value],
            ['label' => self::STATIC_ROUTE->label(), 'value' => self::STATIC_ROUTE->value],
            ['label' => self::OSPF->label(), 'value' => self::OSPF->value],
            ['label' => self::UNKNOWN->label(), 'value' => self::UNKNOWN->value],
        ];
    }

    public function label(): string
    {
        return match ($this) {
            self::DEVICE => 'Device',
            self::DETECTOR => 'Detector',
            self::INTERFACE => 'Interface',
            self::ACL => 'ACL',
            self::STATIC_ROUTE => 'Static Route',
            self::OSPF => 'OSPF',
            default => 'Unknown',
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::DEVICE => 'Device logs are generated when a device is created, updated, or deleted.',
            self::DETECTOR => 'Detector logs are generated when a detector is created, updated, or deleted.',
            self::INTERFACE => 'Interface logs are generated when an interface is created, updated, or deleted.',
            self::ACL => 'ACL logs are generated when an ACL is created, updated, or deleted.',
            self::STATIC_ROUTE => 'Static Route logs are generated when a static route is created, updated, or deleted.',
            self::OSPF => 'OSPF logs are generated when an OSPF configuration is created, updated, or deleted.',
            default => 'Unknown logs are generated when an unknown configuration is created, updated, or deleted.',
        };
    }

    public function badge(): string
    {
        return match ($this) {
            self::DEVICE => '<span class="whitespace-nowrap rounded-full px-2.5 py-0.5 text-xs bg-purple-100 text-purple-600">device</span>',
            self::DETECTOR => '<span class="whitespace-nowrap rounded-full bg-fuchsia-100 px-2.5 py-0.5 text-xs text-fuchsia-600">detector</span>',
            self::INTERFACE => '<span class="whitespace-nowrap rounded-full bg-indigo-100 px-2.5 py-0.5 text-xs text-indigo-600">interface</span>',
            self::ACL => '<span class="whitespace-nowrap rounded-full bg-cyan-100 px-2.5 py-0.5 text-xs text-cyan-600">acl</span>',
            self::STATIC_ROUTE => '<span class="whitespace-nowrap rounded-full bg-emerald-100 px-2.5 py-0.5 text-xs text-emerald-600">static route</span>',
            self::OSPF => '<span class="whitespace-nowrap rounded-full bg-lime-100 px-2.5 py-0.5 text-xs text-lime-600">ospf</span>',
            default => '<span class="whitespace-nowrap rounded-full bg-gray-100 px-2.5 py-0.5 text-xs text-gray-600">unknown</span>',
        };
    }
}
