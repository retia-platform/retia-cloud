<?php

namespace App\Enums\User;

enum Role: string
{
    case SUPER_ADMINISTRATOR = 'super_administrator';
    case ADMINISTRATOR = 'administrator';
    case TECHNICIAN = 'technician';

    public static function toArray(): array
    {
        return [
            self::SUPER_ADMINISTRATOR,
            self::ADMINISTRATOR,
            self::TECHNICIAN,
        ];
    }

    public static function labels(): array
    {
        return [
            self::SUPER_ADMINISTRATOR->label(),
            self::ADMINISTRATOR->label(),
            self::TECHNICIAN->label(),
        ];
    }

    public static function values(): array
    {
        return [
            self::SUPER_ADMINISTRATOR->value,
            self::ADMINISTRATOR->value,
            self::TECHNICIAN->value,
        ];
    }

    public static function labelAndValues(): array
    {
        return [
            ['label' => self::SUPER_ADMINISTRATOR->label(), 'value' => self::SUPER_ADMINISTRATOR->value],
            ['label' => self::ADMINISTRATOR->label(), 'value' => self::ADMINISTRATOR->value],
            ['label' => self::TECHNICIAN->label(), 'value' => self::TECHNICIAN->value],
        ];
    }

    public function label(): string
    {
        return match ($this) {
            self::SUPER_ADMINISTRATOR => 'Super Administrator',
            self::ADMINISTRATOR => 'Administrator',
            self::TECHNICIAN => 'Technician',
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::SUPER_ADMINISTRATOR => 'Super Administrator has all permissions.',
            self::ADMINISTRATOR => 'Administrator has all permissions except for managing roles and permissions.',
            self::TECHNICIAN => 'Technician has limited permissions.',
        };
    }
}
