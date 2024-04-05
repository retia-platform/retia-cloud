<?php

namespace App\Models;

use App\Interfaces\Synthable;
use App\Models\Base\APIModel;
use App\Repositories\DeviceRepository;
use Illuminate\Support\Collection;

class DeviceStaticRoute extends APIModel implements Synthable
{
    // main properties
    public Device $device;

    public string $prefix;

    public string $mask;

    public Collection $forwards;

    public function __construct(
        Device $device,
        string $prefix,
        string $mask,
        array $forwards = [],
    ) {
        $this->device = $device;
        $this->prefix = $prefix;
        $this->mask = $mask;
        $this->forwards = collect($forwards);
    }

    public static function make(Device $device, array|Collection $data): self
    {
        if ($data instanceof Collection) {
            $data = $data->toArray();
        }

        return new self(
            $device,
            $data['prefix'],
            $data['mask'],
            $data['fwd-list'] ?? [],
        );
    }

    public static function all(Device $device, int $amount = 0): Collection
    {
        $staticRoutes = self::api()->get("device/{$device->name}/static-route", amount: $amount, resourceName: self::getResourceName());

        return $staticRoutes->map(function ($staticRoute) use ($device) {
            return self::make($device, $staticRoute);
        });
    }

    public function getId(): string|int
    {
        return $this->prefix;
    }

    public function toArray(): array
    {
        return [
            'prefix' => $this->prefix,
            'mask' => $this->mask,
            'forwards' => $this->forwards->toArray(),
        ];
    }

    public static function synth(array $value): self
    {
        $deviceRepostiory = app(DeviceRepository::class);

        return new self(
            $deviceRepostiory->getDevice($value['device_id']),
            $value['prefix'],
            $value['mask'],
            $value['forwards'],
        );
    }
}
