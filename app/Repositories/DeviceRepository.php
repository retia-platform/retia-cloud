<?php

namespace App\Repositories;

use App\Helpers\Vault;
use App\Models\Device;
use App\Models\DeviceAcl;
use App\Models\DeviceInterface;
use App\Models\DeviceOspf;
use Illuminate\Support\Collection;

class DeviceRepository
{
    /**
     * Devices
     * --------------------
     */
    public function getDevices(int $amount = 0, bool $fresh = false): Collection
    {
        if (! $fresh && ! empty($cache = Vault::get('getDevices'))) {
            return $cache;
        }

        $devices = Device::all(amount: $amount);

        Vault::set('getDevices', $devices);

        return $devices;
    }

    public function getDevice(string $name, bool $fresh = false): ?Device
    {
        if (
            ! $fresh
            && ! empty($cache = Vault::get('getDevice'))
            && ! empty($cachedName = Vault::get('getDevice-name'))
            && $cachedName === $name
        ) {
            return $cache;
        }

        $device = Device::find($name);

        Vault::set('getDevice', $device);
        Vault::set('getDevice-name', $name);

        return $device;
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

    public function addDevice(array $data): ?Device
    {
        return Device::add($data);
    }

    public function updateDevice(string $device, array $data): Device
    {
        $device = $this->getDevice($device, fresh: true);

        $device->update($data);

        return $device->fresh();
    }

    public function deleteDevice(string $device): void
    {
        $this->getDevice($device, fresh: true)->delete();
    }

    /**
     * Device Static ACLs
     * --------------------
     */
    public function getAcls(Device $device, int $amount = 0, bool $fresh = false): Collection
    {
        if (
            ! $fresh
            && ! empty($cache = Vault::get('getAcls'))
            && ! empty($cachedDevice = Vault::get('getAcls-device'))
            && $cachedDevice->name === $device->name
        ) {
            return $cache;
        }

        $acls = $device->getAcls(amount: $amount);

        Vault::set('getAcls', $acls);
        Vault::set('getAcls-device', $device);

        return $acls;
    }

    public function getAcl(Device $device, string $aclName, bool $fresh = false): DeviceAcl
    {
        if (
            ! $fresh
            && ! empty($cache = Vault::get('getAcl'))
            && ! empty($cachedDevice = Vault::get('getAcl-device'))
            && ! empty($cachedAclName = Vault::get('getAcl-aclName'))
            && $cachedDevice->name === $device->name
            && $cachedAclName === $aclName
        ) {
            return $cache;
        }

        $acl = $device->findAcl($aclName);

        Vault::set('getAcl', $acl);
        Vault::set('getAcl-device', $device);
        Vault::set('getAcl-aclName', $aclName);

        return $acl;
    }

    public function addAcl(Device $device, array $data): DeviceAcl
    {
        return $device->addAcl($data);
    }

    public function updateAcl(Device $device, string $aclName, array $data): DeviceAcl
    {
        $device->updateAcl($aclName, $data);

        return $device->findAcl($aclName);
    }

    public function deleteAcl(Device $device, string $aclName): void
    {
        $device->deleteAcl($aclName);
    }

    /**
     * Device Interfaces
     * --------------------
     */
    public function getInterfaces(Device $device, int $amount = 0, bool $fresh = false): Collection
    {
        if (
            ! $fresh
            && ! empty($cache = Vault::get('getInterfaces'))
            && ! empty($cachedDevice = Vault::get('getInterfaces-device'))
            && $cachedDevice->name === $device->name
        ) {
            return $cache;
        }

        $interfaces = $device->getInterfaces(amount: $amount);

        Vault::set('getInterfaces', $interfaces);
        Vault::set('getInterfaces-device', $device);

        return $interfaces;
    }

    public function getInterface(Device $device, string $interfaceName, bool $fresh = false): DeviceInterface
    {
        if (
            ! $fresh
            && ! empty($cache = Vault::get('getInterface'))
            && ! empty($cachedDevice = Vault::get('getInterface-device'))
            && ! empty($cachedInterfaceName = Vault::get('getInterface-interfaceName'))
            && $cachedDevice->name === $device->name
            && $cachedInterfaceName === $interfaceName
        ) {
            return $cache;
        }

        $interface = $device->findInterface($interfaceName);

        Vault::set('getInterface', $interface);
        Vault::set('getInterface-device', $device);
        Vault::set('getInterface-interfaceName', $interfaceName);

        return $interface;
    }

    public function getInterfaceAmount(Device $device): int
    {
        return $this->getInterfaces($device)->count();
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
    public function getOspfs(Device $device, int $amount = 0, bool $fresh = false): Collection
    {
        if (
            ! $fresh
            && ! empty($cache = Vault::get('getOspfs'))
            && ! empty($cachedDevice = Vault::get('getOspfs-device'))
            && $cachedDevice->name === $device->name
        ) {
            return $cache;
        }

        $ospfs = $device->getOspfs(amount: $amount);

        Vault::set('getOspfs', $ospfs);
        Vault::set('getOspfs-device', $device);

        return $ospfs;
    }

    public function getOspf(Device $device, int $ospfID, bool $fresh = false): DeviceOspf
    {
        if (
            ! $fresh
            && ! empty($cache = Vault::get('getOspf'))
            && ! empty($cachedDevice = Vault::get('getOspf-device'))
            && ! empty($cachedOspfID = Vault::get('getOspf-ospfID'))
            && $cachedDevice->name === $device->name
            && $cachedOspfID === $ospfID
        ) {
            return $cache;
        }

        $ospf = $device->findOspf($ospfID);

        Vault::set('getOspf', $ospf);
        Vault::set('getOspf-device', $device);
        Vault::set('getOspf-ospfID', $ospfID);

        return $ospf;
    }

    public function addOspf(Device $device, array $data): DeviceOspf
    {
        return $device->addOspf($data);
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
    public function getStaticRoutes(Device $device, bool $fresh = false): Collection
    {
        if (
            ! $fresh
            && ! empty($cache = Vault::get('getStaticRoutes'))
            && ! empty($cachedDevice = Vault::get('getStaticRoutes-device'))
            && $cachedDevice->name === $device->name
        ) {
            return $cache;
        }

        $staticRoutes = $device->getStaticRoutes();

        Vault::set('getStaticRoutes', $staticRoutes);
        Vault::set('getStaticRoutes-device', $device);

        return $staticRoutes;
    }

    public function updateStaticRoutes(Device $device, array $data): Collection
    {
        $device->updateStaticRoutes(collect($data));

        return $device->getStaticRoutes();
    }
}
