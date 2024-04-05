<?php

namespace App\Models;

use App\Interfaces\Synthable;
use App\Models\Base\APIModel;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Device extends APIModel implements Synthable
{
    // main properties
    public string $name;

    public string $brand;

    public string $type;

    public string $ipAddress;

    public Carbon $createdAt;

    public Carbon $updatedAt;

    public bool $running;

    public Collection $acls;

    public Collection $interfaces;

    public Collection $ospfs;

    public Collection $staticRoutes;

    // nullable properties
    public ?int $port;

    public ?string $username;

    public ?string $secret;

    public ?string $sysUptime;

    public ?string $loginBanner;

    public ?string $motdBanner;

    public ?string $softwareVersion;

    public function __construct(
        string $name,
        string $brand,
        string $type,
        string $ipAddress,
        bool $running,
        ?int $port = null,
        ?string $username = null,
        ?string $secret = null,
        ?string $sysUptime = null,
        ?string $loginBanner = null,
        ?string $motdBanner = null,
        ?string $softwareVersion = null,
        ?string $createdAt = null,
        ?string $updatedAt = null,
    ) {
        $this->name = $name;
        $this->brand = $brand;
        $this->type = $type;
        $this->ipAddress = $ipAddress;
        $this->running = $running;
        $this->port = $port;
        $this->username = $username;
        $this->secret = $secret;
        $this->sysUptime = $sysUptime;
        $this->loginBanner = $loginBanner;
        $this->motdBanner = $motdBanner;
        $this->softwareVersion = $softwareVersion;
        $this->createdAt = empty($createdAt) ? now() : Carbon::parse($createdAt);
        $this->updatedAt = empty($updatedAt) ? now() : Carbon::parse($updatedAt);

        $this->acls = collect();
        $this->interfaces = collect();
        $this->ospfs = collect();
        $this->staticRoutes = collect();
    }

    public static function make(array|Collection $device): self
    {
        if ($device instanceof Collection) {
            $device = $device->toArray();
        }

        return new self(
            $device['hostname'],
            $device['brand'] ?? 'Unknown',
            $device['device_type'] ?? 'Unknown',
            $device['mgmt_ipaddr'] ?? 'unknown',
            Str::lower($device['status'] ?? 'down') === 'up',
            $device['port'] ?? null,
            $device['username'] ?? null,
            $device['secret'] ?? null,
            empty($device['sys_uptime']) || is_array($device['sys_uptime']) ? null : ($device['sys_uptime'] ?? null),
            empty($device['login_banner']) || is_array($device['login_banner']) ? null : ($device['login_banner'] ?? null),
            empty($device['motd_banner']) || is_array($device['motd_banner']) ? null : ($device['motd_banner'] ?? null),
            empty($device['software_version']) || is_array($device['software_version']) ? null : ($device['software_version'] ?? null),
            $device['created_at'] ?? null,
            $device['modified_at'] ?? null,
        );
    }

    public static function all(int $amount = 0): Collection
    {
        $devices = self::api()->get('device', amount: $amount, resourceName: self::getResourceName());

        return $devices->map(function ($device) {
            return self::make($device);
        });
    }

    public static function find(string $device): ?self
    {
        $device = self::api()->get("device/$device", resourceName: self::getResourceName());

        return empty($device) || $device->count() <= 0 ? null : self::make($device);
    }

    public static function create(array $data): ?self
    {
        self::api()->post('device', resourceName: self::getResourceName(), body: [
            'hostname' => $device = $data['name'],
            'brand' => $data['brand'],
            'device_type' => $data['type'],
            'mgmt_ipaddr' => $data['ip_address'],
            'port' => $data['port'] ?? null,
            'username' => $data['username'] ?? null,
            'secret' => $data['secret'] ?? null,
            'login_banner' => $data['login_banner'] ?? null,
            'motd_banner' => $data['motd_banner'] ?? null,
        ]);

        if (session()->has('errors')) {
            return null;
        }

        return self::find($device);

    }

    public function update(array $data): void
    {
        self::api()->post("device/{$this->name}", resourceName: self::getResourceName(), body: [
            'hostname' => $data['name'],
            'brand' => $data['brand'],
            'device_type' => $data['type'],
            'mgmt_ipaddr' => $data['ip_address'],
            'port' => $data['port'] ?? null,
            'username' => $data['username'] ?? null,
            'secret' => $data['secret'] ?? null,
            'login_banner' => $data['login_banner'] ?? null,
            'motd_banner' => $data['motd_banner'] ?? null,
        ]);

        $this->refresh();
    }

    public function save(): self
    {
        self::api()->put("device/{$this->name}", resourceName: self::getResourceName(), body: [
            'hostname' => $this->name,
            'brand' => $this->brand,
            'device_type' => $this->type,
            'mgmt_ipaddr' => $this->ipAddress,
            'port' => $this->port ?? null,
            'username' => $this->username ?? null,
            'secret' => $this->secret ?? null,
            'login_banner' => $this->loginBanner ?? null,
            'motd_banner' => $this->motdBanner ?? null,
        ]);

        return $this->fresh();
    }

    public function delete(): void
    {
        self::api()->delete("device/{$this->name}", resourceName: self::getResourceName());
    }

    public function refresh(): void
    {
        $device = self::api()->get("device/{$this->name}", resourceName: self::getResourceName());

        if (empty($device)) {
            throw new Exception('Device not found!');
        }

        $this->name = $device['hostname'];
        $this->brand = $device['brand'];
        $this->type = $device['device_type'];
        $this->ipAddress = $device['mgmt_ipaddr'];
        $this->running = Str::lower($device['status']) === 'up';
        $this->port = $device['port'] ?? null;
        $this->username = $device['username'] ?? null;
        $this->secret = $device['secret'] ?? null;
        $this->sysUptime = $device['sys_uptime'] ?? null;
        $this->loginBanner = $device['login_banner'] ?? null;
        $this->motdBanner = $device['motd_banner'] ?? null;
        $this->softwareVersion = $device['sotfware_version'] ?? null;
        $this->createdAt = empty($device['created_at']) ? now() : Carbon::parse($device['created_at']);
        $this->updatedAt = empty($device['modified_at']) ? now() : Carbon::parse($device['modified_at']);
    }

    public function hydrate(): void
    {
        $this->refreshAcls();
        $this->refreshInterfaces();
        $this->refreshOspfs();
        $this->refreshStaticRoutes();
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
            'name' => $this->name,
            'brand' => $this->brand,
            'type' => $this->type,
            'ip_address' => $this->ipAddress,
            'running' => $this->isRunning(),
            'port' => $this->port,
            'username' => $this->username,
            'secret' => $this->secret,
            'sys_uptime' => $this->sysUptime,
            'login_banner' => $this->loginBanner,
            'motd_banner' => $this->motdBanner,
            'software_version' => $this->softwareVersion,
            'created_at' => $this->createdAt->toDateTimeString(),
            'updated_at' => $this->updatedAt->toDateTimeString(),
        ];
    }

    public static function synth(array $value): self
    {
        return new self(
            $value['name'],
            $value['brand'],
            $value['type'],
            $value['ip_address'],
            $value['running'],
            $value['port'],
            $value['username'],
            $value['secret'],
            $value['sys_uptime'],
            $value['login_banner'],
            $value['motd_banner'],
            $value['software_version'],
            $value['created_at'],
            $value['modified_at'] ?? null,
        );
    }

    /**
     * ACLs
     * --------------------
     */
    public function getAcls(int $amount = 0): Collection
    {
        if ($this->acls->isEmpty()) {
            $this->acls = DeviceAcl::all($this, amount: $amount);
        }

        return $this->acls;
    }

    public function refreshAcls(): void
    {
        $this->acls = DeviceAcl::all($this);
    }

    public function findAcl(string $acl): DeviceAcl
    {
        return DeviceAcl::find($this, $acl);
    }

    public function createAcl(array $data): DeviceAcl
    {
        return DeviceAcl::create($this, $data);
    }

    public function updateAcl(string $acl, array $data): void
    {
        $this->findAcl($acl)->update($data);
    }

    public function deleteAcl(string $acl): void
    {
        $this->findAcl($acl)->delete();
    }

    /**
     * Interfaces
     * --------------------
     */
    public function getInterfaces(int $amount = 0): Collection
    {
        if ($this->interfaces->isEmpty()) {
            $this->interfaces = DeviceInterface::all($this, amount: $amount);
        }

        return $this->interfaces;
    }

    public function refreshInterfaces(): void
    {
        $this->interfaces = DeviceInterface::all($this);
    }

    public function findInterface(string $interface): DeviceInterface
    {
        return DeviceInterface::find($this, $interface);
    }

    public function updateInterface(string $interface, array $data): void
    {
        $this->findInterface($interface)->update($data);
    }

    /**
     * OSPFs
     * --------------------
     */
    public function getOspfs(int $amount = 0): Collection
    {
        if ($this->ospfs->isEmpty()) {
            $this->ospfs = DeviceOspf::all($this, amount: $amount);
        }

        return $this->ospfs;
    }

    public function refreshOspfs(): void
    {
        $this->ospfs = DeviceOspf::all($this);
    }

    public function findOspf(string $ospf): DeviceOspf
    {
        return DeviceOspf::find($this, $ospf);
    }

    public function createOspf(array $data): DeviceOspf
    {
        return DeviceOspf::create($this, $data);
    }

    public function updateOspf(string $ospf, array $data): void
    {
        $this->findOspf($ospf)->update($data);
    }

    public function deleteOspf(string $ospf): void
    {
        $this->findOspf($ospf)->delete();
    }

    /**
     * Static Routes
     * --------------------
     */
    public function getStaticRoutes(): Collection
    {
        if ($this->staticRoutes->isEmpty()) {
            $this->staticRoutes = DeviceStaticRoute::all($this);
        }

        return $this->staticRoutes;
    }

    public function refreshStaticRoutes(): void
    {
        $this->staticRoutes = DeviceStaticRoute::all($this);
    }

    public function updateStaticRoutes(Collection $data): void
    {
        self::api()->put("device/{$this->name}/static-route", resourceName: self::getResourceName(), body: [
            $data->map(fn ($item) => [
                'prefix' => $item['prefix'],
                'mask' => $item['mask'],
                'fwd-list' => $item['forwards'],
            ])->toArray(),
        ]);
    }
}
