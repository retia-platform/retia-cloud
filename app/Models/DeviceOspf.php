<?php

namespace App\Models;

use App\Interfaces\Synthable;
use App\Models\Base\APIModel;
use App\Repositories\DeviceRepository;
use Illuminate\Support\Collection;

class DeviceOspf extends APIModel implements Synthable
{
    // main properties
    public Device $device;

    public int $id;

    public bool $defaultInformationOriginate;

    public Collection $networks;

    public Collection $passiveInterfaces;

    public Collection $redistributes;

    public function __construct(
        Device $device,
        int $id,
        bool $defaultInformationOriginate = false,
        array $networks = [],
        array $passiveInterfaces = [],
        array $redistributes = [],
    ) {
        $this->device = $device;
        $this->id = $id;
        $this->defaultInformationOriginate = $defaultInformationOriginate;
        $this->networks = collect($networks);
        $this->passiveInterfaces = collect($passiveInterfaces);
        $this->redistributes = collect($redistributes);
    }

    public static function make(Device $device, array|Collection $data): self
    {
        if ($data instanceof Collection) {
            $data = $data->toArray();
        }

        return new self(
            $device,
            $data['id'],
            empty($data['default_information_originate']) ? false : (bool) $data['default_information_originate'],
            $data['networks'] ?? [],
            $data['passive-interface'] ?? [],
            $data['redistribute'] ?? [],
        );
    }

    public static function all(Device $device, int $amount = 0): Collection
    {
        $ospfs = self::api()->get("device/{$device->name}/routing/ospf-process", amount: $amount, resourceName: self::getResourceName());

        return $ospfs->map(function ($ospf) use ($device) {
            return self::make($device, $ospf);
        });
    }

    public static function find(Device $device, int $ospf): self
    {
        $ospf = self::api()->get("device/{$device->name}/routing/ospf-process/$ospf", resourceName: self::getResourceName());

        return self::make($device, $ospf);
    }

    public static function create(Device $device, array $data): self
    {
        self::api()->post("device/{$device->name}/routing/ospf-process", resourceName: self::getResourceName(), body: [
            'id' => $ospf = $data['id'],
            'networks' => $data['networks'] ?? [],
            'passive_interface' => $data['passiveInterfaces'] ?? [],
            'redistribute' => $data['redistributes'] ?? [],
            'default_information_originate' => empty($data['defaultInformationOriginate']) ? false : (bool) $data['defaultInformationOriginate'],
        ]);

        return self::find($device, $ospf);
    }

    public function update(array $data): void
    {
        self::api()->put("device/{$this->device->name}/routing/ospf-process/{$this->id}", resourceName: self::getResourceName(), body: [
            'id' => $data['id'],
            'networks' => $data['networks'] ?? [],
            'passive_interface' => $data['passiveInterfaces'] ?? [],
            'redistribute' => $data['redistributes'] ?? [],
            'default_information_originate' => empty($data['defaultInformationOriginate']) ? false : (bool) $data['defaultInformationOriginate'],
        ]);

        $this->refresh();
    }

    public function save(): self
    {
        self::api()->put("device/{$this->device->name}/routing/ospf-process/{$this->id}", resourceName: self::getResourceName(), body: [
            'networks' => $this->networks->toArray(),
            'passive_interface' => $this->passiveInterfaces->toArray(),
            'redistribute' => $this->redistributes->toArray(),
            'default_information_originate' => $this->isDefaultInformationOriginate(),
        ]);

        return $this->fresh();
    }

    public function delete(): void
    {
        self::api()->delete("device/{$this->device->name}/routing/ospf-process/{$this->id}", resourceName: self::getResourceName());
    }

    public function refresh(): void
    {
        $ospf = self::find($this->device, $this->id);

        $this->id = $ospf->id;
        $this->networks = $ospf->networks;
        $this->passiveInterfaces = $ospf->passiveInterfaces;
        $this->redistributes = $ospf->redistributes;
        $this->defaultInformationOriginate = $ospf->defaultInformationOriginate;
    }

    public function isDefaultInformationOriginate(): bool
    {
        return $this->defaultInformationOriginate;
    }

    public function getId(): string|int
    {
        return $this->id;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'networks' => $this->networks->toArray(),
            'passive_interfaces' => $this->passiveInterfaces->toArray(),
            'redistributes' => $this->redistributes->toArray(),
            'default_information_originate' => $this->isDefaultInformationOriginate(),
        ];
    }

    public static function synth(array $value): self
    {
        $deviceRepostiory = app(DeviceRepository::class);

        return new self(
            $deviceRepostiory->getDevice($value['device_id']),
            $value['networks'],
            $value['passive_interfaces'],
            $value['redistributes'],
            $value['default_information_originate'],
        );
    }
}
