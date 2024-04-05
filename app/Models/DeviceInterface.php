<?php

namespace App\Models;

use App\Interfaces\Synthable;
use App\Models\Base\APIModel;
use App\Repositories\DeviceRepository;
use Exception;
use Illuminate\Support\Collection;

class DeviceInterface extends APIModel implements Synthable
{
    // main properties
    public Device $device;

    public string $name;

    public bool $enabled;

    public bool $running;

    // nullable properties
    public ?string $type;

    public ?string $ipAddress;

    public ?string $netmask;

    public function __construct(
        Device $device,
        string $name,
        ?string $type,
        ?string $ipAddress,
        ?string $netmask,
        bool $enabled,
        bool $running,
    ) {
        $this->device = $device;
        $this->name = $name;
        $this->type = $type;
        $this->ipAddress = $ipAddress;
        $this->netmask = $netmask;
        $this->enabled = $enabled;
        $this->running = $running;
    }

    public static function make(Device $device, array|Collection $data): self
    {
        if ($data instanceof Collection) {
            $data = $data->toArray();
        }

        if (empty($data['name']) && ! empty($data['ietf-interfaces:interface']['name'])) {
            $data['name'] = $data['ietf-interfaces:interface']['name'];
        }

        return new self(
            $device,
            $data['name'],
            $data['type'] ?? null,
            $data['ip'] ?? null,
            $data['netmask'] ?? null,
            empty($data['enabled']) ? false : (bool) $data['enabled'],
            empty($data['status']) ? false : ($data['status'] === 'up' ? true : false),
        );
    }

    public static function all(Device $device, int $amount = 0): Collection
    {
        $interfaces = self::api()->get("device/{$device->name}/interface", amount: $amount, resourceName: self::getResourceName());

        return $interfaces->map(function ($interface) use ($device) {
            return self::make($device, ['name' => $interface]);
        });
    }

    public static function find(Device $device, string $interface): self
    {
        $interface = self::api()->get("device/{$device->name}/interface/$interface", resourceName: self::getResourceName());

        return self::make($device, $interface);
    }

    public function update(array $data): void
    {
        self::api()->put("device/{$this->device->name}/interface/{$this->name}", resourceName: self::getResourceName(), body: [
            'name' => $data['name'],
            'ip' => $data['ip'] ?? null,
            'netmask' => $data['netmask'] ?? null,
            'enabled' => empty($data['enabled']) ? false : (bool) $data['enabled'],
        ]);

        $this->refresh();
    }

    public function save(): self
    {
        self::api()->put("device/{$this->device->name}/interface/{$this->name}", resourceName: self::getResourceName(), body: [
            'name' => $this->name,
            'ip' => $this->ipAddress,
            'netmask' => $this->netmask,
            'enabled' => $this->isEnabled(),
        ]);

        return $this->fresh();
    }

    public function delete(): void
    {
        throw new Exception(self::getResourceName().' delete action is not supported');
    }

    public function refresh(): void
    {
        $interface = self::find($this->device, $this->name);

        $this->name = $interface->name;
        $this->type = $interface->type;
        $this->ipAddress = $interface->ipAddress;
        $this->netmask = $interface->netmask;
        $this->enabled = $interface->isEnabled();
        $this->running = $interface->isRunning();
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function isRunning(): bool
    {
        return $this->running;
    }

    public function getId(): string|int
    {
        return $this->name;
    }

    public function toArray(): array
    {
        return [
            'device_id' => $this->device->getId(),
            'name' => $this->name,
            'type' => $this->type,
            'ip_address' => $this->ipAddress,
            'netmask' => $this->netmask,
            'enabled' => $this->isEnabled(),
            'running' => $this->isRunning(),
        ];
    }

    public static function synth(array $value): self
    {
        $deviceRepostiory = app(DeviceRepository::class);

        return new self(
            $deviceRepostiory->getDevice($value['device_id']),
            $value['name'],
            $value['type'],
            $value['ip_address'],
            $value['netmask'],
            $value['enabled'],
            $value['running'],
        );
    }
}
