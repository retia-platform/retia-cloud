<?php

namespace App\Repositories;

use App\Models\Device;
use App\Models\DeviceAcl;
use App\Models\DeviceInterface;
use App\Models\DeviceOspf;
use App\Traits\Requestable;
use Illuminate\Support\Collection;

class DeviceRepository
{
    use Requestable;

    private ?Device $cachedDevice = null;

    private ?Collection $cachedDevices = null;

    private ?Collection $cachedAcls = null;

    private ?Collection $cachedInterfaces = null;

    private ?Collection $cachedOspfs = null;

    private ?Collection $cachedStaticRoutes = null;

    /**
     * Devices
     * --------------------
     */
    public function getDevices(int $amount = 0): Collection
    {
        if (! empty($this->cachedDevices)) {
            return $this->cachedDevices;
        }

        return $this->cachedDevices = Device::all(amount: $amount);
    }

    public function getDevice(string $name): ?Device
    {
        if ($name === $this->cachedDevice?->name) {
            return $this->cachedDevice;
        }

        return $this->cachedDevice = Device::find($name);
    }

    public function getDeviceAmount(): int
    {
        return $this->getDevices()->count();
    }

    public function getRunningDeviceAmount(): int
    {
        return $this->getDevices()->filter(fn ($device) => $device->isRunning())->count();
    }

    public function getRunningDevicePercentage(): int
    {
        if ($this->getRunningDeviceAmount() <= 0 || $this->getDeviceAmount() <= 0) {
            return 0;
        }

        return $this->getRunningDeviceAmount() / $this->getDeviceAmount() * 100;
    }

    public function createDevice(array $data): ?Device
    {
        return Device::create($data);
    }

    public function updateDevice(string $device, array $data): Device
    {
        $device = $this->getDevice($device);

        $device->update($data);

        return $device->fresh();
    }

    public function deleteDevice(string $device): void
    {
        $this->getDevice($device)->delete();
    }

    /**
     * Device Static ACLs
     * --------------------
     */
    public function getAcls(Device $device, int $amount = 0): Collection
    {
        if (! empty($this->cachedAcls)) {
            return $this->cachedAcls;
        }

        return $this->cachedAcls = $device->getAcls(amount: $amount);
    }

    public function getAcl(Device $device, string $acl): DeviceAcl
    {
        return $device->findAcl($acl);
    }

    public function createAcl(Device $device, array $data): DeviceAcl
    {
        return $device->createAcl($data);
    }

    public function updateAcl(Device $device, string $acl, array $data): DeviceAcl
    {
        $device->updateAcl($acl, $data);

        return $device->findAcl($acl);
    }

    public function deleteAcl(Device $device, string $acl): void
    {
        $device->deleteAcl($acl);
    }

    /**
     * Device Interfaces
     * --------------------
     */
    public function getInterfaces(Device $device, int $amount = 0): Collection
    {
        if (! empty($this->cachedInterfaces)) {
            return $this->cachedInterfaces;
        }

        return $this->cachedInterfaces = $device->getInterfaces(amount: $amount);
    }

    public function getInterfaceAmount(Device $device): int
    {
        return $this->getInterfaces($device)->count();
    }

    public function getInterface(Device $device, string $interface): DeviceInterface
    {
        return $device->findInterface($interface);
    }

    public function updateInterface(Device $device, string $interface, array $data): DeviceInterface
    {
        $device->updateInterface($interface, $data);

        return $device->findInterface($interface);
    }

    /**
     * Device Static OSPFs
     * --------------------
     */
    public function getOspfs(Device $device, int $amount = 0): Collection
    {
        if (! empty($this->cachedOspfs)) {
            return $this->cachedOspfs;
        }

        return $this->cachedOspfs = $device->getOspfs(amount: $amount);
    }

    public function getOspf(Device $device, int $ospf): DeviceOspf
    {
        return $device->findOspf($ospf);
    }

    public function createOspf(Device $device, array $data): DeviceOspf
    {
        return $device->createOspf($data);
    }

    public function updateOspf(Device $device, int $ospf, array $data): DeviceOspf
    {
        $device->updateOspf($ospf, $data);

        return $device->findOspf($ospf);
    }

    public function deleteOspf(Device $device, int $ospf): void
    {
        $device->deleteOspf($ospf);
    }

    /**
     * Device Static Routes
     * --------------------
     */
    public function getStaticRoutes(Device $device): Collection
    {
        if (! empty($this->cachedStaticRoutes)) {
            return $this->cachedStaticRoutes;
        }

        return $this->cachedStaticRoutes = $device->getStaticRoutes();
    }

    public function updateStaticRoutes(Device $device, array $data): Collection
    {
        $device->updateStaticRoutes(collect($data));

        return $this->cachedStaticRoutes = $device->getStaticRoutes();
    }
}
