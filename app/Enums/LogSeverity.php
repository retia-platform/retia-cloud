<?php

namespace App\Enums;

enum LogSeverity: string
{
    case INFO = 'info';
    case WARNING = 'warning';
    case ERROR = 'error';
    case UNKNOWN = 'unknown';

    public static function toArray(): array
    {
        return [
            self::INFO,
            self::WARNING,
            self::ERROR,
            self::UNKNOWN,
        ];
    }

    public static function labels(): array
    {
        return [
            self::INFO->label(),
            self::WARNING->label(),
            self::ERROR->label(),
            self::UNKNOWN->label(),
        ];
    }

    public static function values(): array
    {
        return [
            self::INFO->value,
            self::WARNING->value,
            self::ERROR->value,
            self::UNKNOWN->value,
        ];
    }

    public static function labelAndValues(): array
    {
        return [
            ['label' => self::INFO->label(), 'value' => self::INFO->value],
            ['label' => self::WARNING->label(), 'value' => self::WARNING->value],
            ['label' => self::ERROR->label(), 'value' => self::ERROR->value],
            ['label' => self::UNKNOWN->label(), 'value' => self::UNKNOWN->value],
        ];
    }

    public function label(): string
    {
        return match ($this) {
            self::INFO => 'Information',
            self::WARNING => 'Warning',
            self::ERROR => 'Error',
            default => 'Unknown',
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::INFO => 'Informational messages that highlight the progress of the application at a particular point in time.',
            self::WARNING => 'Warning messages that highlight potential issues that may arise in the future.',
            self::ERROR => 'Error messages that highlight issues that have already occurred and need to be addressed.',
            default => 'Unknown messages that do not fall into any of the predefined categories.',
        };
    }

    public function badge(): string
    {
        return match ($this) {
            self::INFO => '<span class="whitespace-nowrap rounded-full bg-blue-100 px-2.5 py-0.5 text-xs text-blue-600">information</span>',
            self::WARNING => '<span class="whitespace-nowrap rounded-full bg-yellow-100 px-2.5 py-0.5 text-xs text-yellow-600">warning</span>',
            self::ERROR => '<span class="whitespace-nowrap rounded-full bg-red-100 px-2.5 py-0.5 text-xs text-red-600">error</span>',
            default => '<span class="whitespace-nowrap rounded-full bg-gray-100 px-2.5 py-0.5 text-xs text-gray-600">unknown</span>',
        };
    }
}
