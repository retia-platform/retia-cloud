<?php

namespace App\Models;

use App\Models\Base\APIModel;
use Illuminate\Support\Collection;

class DeviceAcl extends APIModel
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
        $acl = self::api()->get("device/{$this->device->name}/acl/{$this->name}", resourceName: self::getResourceName());

        $this->name = $acl['name'];
        $this->rules = collect($acl['rules'] ?? []);
        $this->applyToInterfaces = collect($acl['apply_to_interface'] ?? []);
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'rules' => $this->rules->toArray(),
            'apply_to_interfaces' => $this->applyToInterfaces->toArray(),
        ];
    }
}
