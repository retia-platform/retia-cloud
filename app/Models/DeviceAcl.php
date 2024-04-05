<?php

namespace App\Models;

use App\Interfaces\Synthable;
use App\Models\Base\APIModel;
use App\Repositories\DeviceRepository;
use Illuminate\Support\Collection;

class DeviceAcl extends APIModel implements Synthable
{
    // main properties
    private Device $device;

    public string $name;

    public Collection $rules;

    public Collection $applyToInterfaces;

    public function __construct(
        Device $device,
        string $name,
        array $rules = [],
        array $applyToInterfaces = [],
    ) {
        $this->device = $device;
        $this->name = $name;
        $this->rules = collect($rules);
        $this->applyToInterfaces = collect($applyToInterfaces);
    }

    public static function make(Device $device, array|Collection $data): self
    {
        if ($data instanceof Collection) {
            $data = $data->toArray();
        }

        return new self(
            $device,
            $data['name'],
            $data['rules'] ?? [],
            $data['apply_to_interface'] ?? [],
        );
    }

    public static function all(Device $device, int $amount = 0): Collection
    {
        $acls = self::api()->get("device/{$device->name}/acl", amount: $amount, resourceName: self::getResourceName());

        return $acls->map(function ($acl) use ($device) {
            return self::make($device, $acl);
        });
    }

    public static function find(Device $device, string $acl): self
    {
        $acl = self::api()->get("device/{$device->name}/acl/$acl", resourceName: self::getResourceName());

        return self::make($device, $acl);
    }

    public static function create(Device $device, array $data): self
    {
        self::api()->post("device/{$device->name}/acl", resourceName: self::getResourceName(), body: [
            'name' => $acl = $data['name'],
            'rules' => $data['rules'] ?? [],
            'apply_to_interface' => $data['applyToInterfaces'] ?? [],
        ]);

        return self::find($device, $acl);
    }

    public function update(array $data): void
    {
        self::api()->put("device/{$this->device->name}/acl/{$this->name}", resourceName: self::getResourceName(), body: [
            'name' => $data['name'],
            'rules' => $data['rules'] ?? [],
            'apply_to_interface' => $data['applyToInterfaces'] ?? [],
        ]);

        $this->refresh();
    }

    public function save(): self
    {
        self::api()->put("device/{$this->device->name}/acl/{$this->name}", resourceName: self::getResourceName(), body: [
            'name' => $this->name,
            'rules' => $this->rules->toArray(),
            'apply_to_interface' => $this->applyToInterfaces->toArray(),
        ]);

        return $this->fresh();
    }

    public function delete(): void
    {
        self::api()->delete("device/{$this->device->name}/acl/{$this->name}", resourceName: self::getResourceName());
    }

    public function refresh(): void
    {
        $acl = self::find($this->device, $this->name);

        $this->name = $acl->name;
        $this->rules = $acl->rules;
        $this->applyToInterfaces = $acl->applyToInterfaces;
    }

    public function getId(): string|int
    {
        return $this->name;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'rules' => $this->rules->toArray(),
            'apply_to_interfaces' => $this->applyToInterfaces->toArray(),
        ];
    }

    public static function synth(array $value): self
    {
        $deviceRepostiory = app(DeviceRepository::class);

        return new self(
            $deviceRepostiory->getDevice($value['device_id']),
            $value['name'],
            $value['rules'],
            $value['apply_to_interfaces'],
        );
    }
}
