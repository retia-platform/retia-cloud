<?php

namespace App\Models;

use App\Helpers\Time;
use App\Interfaces\Synthable;
use App\Models\Base\APIModel;
use App\Traits\Requestable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Log extends APIModel implements Synthable
{
    use Requestable;

    // main properties
    public string $severity; // info, warning, error

    public string $category; // device, interface, static route, ospf, acl, detector

    public string $instance; // device name, retia-engine

    public string $messages;

    public Carbon $time;

    // nullable properties
    public ?Device $device;

    public function __construct(
        string $severity,
        string $category,
        string $instance,
        string $messages,
        string $time,
    ) {
        $this->severity = $severity;
        $this->category = $category;
        $this->instance = $instance;
        $this->messages = $messages;
        $this->time = empty($time) ? now() : Carbon::parse($time);
    }

    public static function all(
        ?Carbon $from = null,
        ?Carbon $to = null,
        int $amount = 0,
    ): Collection {
        $filter = Time::queryParams($from ?? now()->startOfMonth(), $to ?? now()->endOfMonth());

        $response = self::withToken()->get(config('services.retia_api.url')."log/activity$filter");

        self::authorize($response);

        return self::collect($response, $amount)->map(function ($detector) {
            return self::make($detector);
        });
    }

    public static function make(array|Collection $log): self
    {
        if ($log instanceof Collection) {
            $log = $log->toArray();
        }

        return new self(
            Str::lower($log['severity']),
            Str::lower($log['category']),
            Str::lower($log['instance']),
            $log['messages'],
            $log['time'],
        );
    }

    public function toArray(): array
    {
        return [
            'severity' => $this->severity,
            'category' => $this->category,
            'instance' => $this->instance,
            'messages' => $this->messages,
            'time' => $this->time->toDateTimeString(),
        ];
    }

    public static function synth(array $value): self
    {
        return new self(
            $value['severity'],
            $value['category'],
            $value['instance'],
            $value['messages'],
            $value['time'],
        );
    }

    public function getId(): string|int
    {
        return $this->instance.$this->time->timestamp;
    }

    public function isInfoSeverity(): bool
    {
        return $this->severity === 'info';
    }

    public function isWarningSeverity(): bool
    {
        return $this->severity === 'warning';
    }

    public function isErrorSeverity(): bool
    {
        return $this->severity === 'error';
    }

    public function isDeviceCategory(): bool
    {
        return $this->category === 'device';
    }

    public function isDetectorCategory(): bool
    {
        return $this->category === 'detector';
    }

    public function isInterfaceCategory(): bool
    {
        return $this->category === 'interface';
    }

    public function isStaticRouteCategory(): bool
    {
        return $this->category === 'static route';
    }

    public function isOspfCategory(): bool
    {
        return $this->category === 'ospf';
    }

    public function isAclCategory(): bool
    {
        return $this->category === 'acl';
    }

    public function isEngineInstance(): bool
    {
        return $this->instance === 'retia-engine';
    }

    public function isDeviceInstance(): bool
    {
        return $this->instance === 'device';
    }
}
