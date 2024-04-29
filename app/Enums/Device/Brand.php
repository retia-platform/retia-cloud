<?php

namespace App\Enums\Device;

enum Brand: string
{
    case CISCO = 'cisco';
    case MIKROTIK = 'mikrotik';
    case JUNIPER = 'juniper';

    public static function toArray(): array
    {
        return [
            self::CISCO,
            self::MIKROTIK,
            self::JUNIPER,
        ];
    }

    public static function labels(): array
    {
        return [
            self::CISCO->label(),
            self::MIKROTIK->label(),
            self::JUNIPER->label(),
        ];
    }

    public static function values(): array
    {
        return [
            self::CISCO->value,
            self::MIKROTIK->value,
            self::JUNIPER->value,
        ];
    }

    public static function labelAndValues(): array
    {
        return [
            ['label' => self::CISCO->label(), 'value' => self::CISCO->value],
            ['label' => self::MIKROTIK->label(), 'value' => self::MIKROTIK->value],
            ['label' => self::JUNIPER->label(), 'value' => self::JUNIPER->value],
        ];
    }

    public function label(): string
    {
        return match ($this) {
            self::CISCO => 'Cisco',
            self::MIKROTIK => 'MikroTik',
            self::JUNIPER => 'Juniper',
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::CISCO => 'Cisco Systems, Inc. is an American multinational technology conglomerate headquartered in San Jose, California, in the center of Silicon Valley.',
            self::MIKROTIK => 'MikroTik is a Latvian network equipment manufacturer. The company develops and sells wired and wireless network routers, network switches, access points, as well as operating systems and auxiliary software.',
            self::JUNIPER => 'Juniper Networks, Inc. is an American multinational corporation headquartered in Sunnyvale, California. The company develops and markets networking products, including routers, switches, network management software, network security products, and software-defined networking technology.',
        };
    }
}
