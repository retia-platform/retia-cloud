<?php

namespace App\Models;

use App\Models\Base\APIModel;
use App\Traits\CanIdentifyByName;
use App\Traits\HasRunningState;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Detector extends APIModel
{
    use CanIdentifyByName;
    use HasRunningState;

    // main properties
    public string $name;

    public string $brand;

    public string $type;

    public string $ipAddress;

    public Carbon $createdAt;

    public Carbon $updatedAt;

    // nullable properties
    public ?array $sync;

    public ?array $data;

    public function __construct(
        string $name,
        string $brand,
        string $type,
        string $ipAddress,
        bool $running,
        ?array $sync = null,
        ?array $data = null,
    ) {
        $this->name = $name;
        $this->brand = $brand;
        $this->type = $type;
        $this->ipAddress = $ipAddress;
        $this->running = $running;
        $this->sync = $sync;
        $this->data = $data;
        $this->createdAt = empty($createdAt) ? now() : Carbon::parse($createdAt);
        $this->updatedAt = empty($updatedAt) ? now() : Carbon::parse($updatedAt);
    }

    public static function all(int $amount = 0): Collection
    {
        $detectors = self::api()->get('detector', amount: $amount, resourceName: self::getResourceName());

        return $detectors->map(function ($detector) {
            return self::make($detector);
        });
    }

    public static function find(string $detector): ?self
    {
        $detector = self::api()->get("detector/$detector", resourceName: self::getResourceName());

        return empty($detector) || $detector->count() <= 0 ? null : self::make($detector);
    }

    public static function add(array $data): ?self
    {
        self::api()->post('detector', resourceName: self::getResourceName(), body: [
            'device' => $detector = $data['device'],
            'device_interface_to_filebeat' => $data['device_interface_to_filebeat'],
            'device_interface_to_server' => $data['device_interface_to_server'],
            'elastic_host' => $data['elastic_host'],
            'elastic_index' => $data['elastic_index'],
            'filebeat_host' => $data['filebeat_host'],
            'filebeat_port' => $data['filebeat_port'],
            'window_size' => $data['window_size'],
            'sampling_interval' => $data['sampling_interval'],
        ]);

        if (session()->has('errors')) {
            return null;
        }

        return self::find($detector);
    }

    public function update(array $data): void
    {
        self::api()->post("detector/{$this->name}", resourceName: self::getResourceName(), body: [
            'device' => $data['device'],
            'device_interface_to_filebeat' => $data['device_interface_to_filebeat'],
            'device_interface_to_server' => $data['device_interface_to_server'],
            'elastic_host' => $data['elastic_host'],
            'elastic_index' => $data['elastic_index'],
            'filebeat_host' => $data['filebeat_host'],
            'filebeat_port' => $data['filebeat_port'],
            'window_size' => $data['window_size'],
            'sampling_interval' => $data['sampling_interval'],
        ]);

        $this->refresh();
    }

    public function save(): self
    {
        if (empty($this->data['device_interface_to_filebeat'])) {
            throw new Exception('Detector data is unknown or not found!');
        }

        self::api()->put("detector/{$this->name}", resourceName: self::getResourceName(), body: [
            'device' => $this->name,
            'device_interface_to_filebeat' => $this->data['device_interface_to_filebeat'],
            'device_interface_to_server' => $this->data['device_interface_to_server'],
            'elastic_host' => $this->data['elastic_host'],
            'elastic_index' => $this->data['elastic_index'],
            'filebeat_host' => $this->data['filebeat_host'],
            'filebeat_port' => $this->data['filebeat_port'],
            'window_size' => $this->data['window_size'],
            'sampling_interval' => $this->data['sampling_interval'],
        ]);

        return $this->fresh();
    }

    public function delete(): void
    {
        self::api()->delete("detector/{$this->name}", resourceName: self::getResourceName());
    }

    public function refresh(): void
    {
        $detector = self::find($this->name);

        if (empty($detector)) {
            throw new Exception('Detector not found!');
        }

        $this->name = $detector->name;
        $this->brand = $detector->brand;
        $this->type = $detector->type;
        $this->ipAddress = $detector->ipAddress;
        $this->running = $detector->isRunning();
        $this->sync = $detector->sync;
        $this->data = $detector->data;
        $this->createdAt = $detector->createdAt;
        $this->updatedAt = $detector->updatedAt;
    }

    public static function make(array|Collection $detector): self
    {
        if ($detector instanceof Collection) {
            $detector = $detector->toArray();
        }

        if (empty($detector['data']['device'])) {
            $name = $detector['device'];
            $brand = $detector['brand'];
            $type = $detector['device_type'];
            $ipAddress = $detector['mgmt_ipaddr'];
            $running = Str::lower($detector['status']) === 'up';
            $createdAt = empty($detector['created_at']) ? now() : Carbon::parse($detector['created_at']);
            $updatedAt = empty($detector['modified_at']) ? now() : Carbon::parse($detector['modified_at']);
        } else {
            $name = $detector['data']['device'];
            $brand = $detector['data']['brand'];
            $type = $detector['data']['device_type'];
            $ipAddress = $detector['data']['mgmt_ipaddr'];
            $running = Str::lower($detector['data']['status']) === 'up';
            $createdAt = empty($detector['data']['created_at']) ? now() : Carbon::parse($detector['data']['created_at']);
            $updatedAt = empty($detector['data']['modified_at']) ? now() : Carbon::parse($detector['data']['modified_at']);
        }

        return new self(
            $name,
            $brand,
            $type,
            $ipAddress,
            $running,
            $detector['sync'] ?? null,
            $detector['data'] ?? null,
            $createdAt,
            $updatedAt,
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'brand' => $this->brand,
            'type' => $this->type,
            'ip_address' => $this->ipAddress,
            'running' => $this->isRunning(),
            'sync' => $this->sync,
            'data' => $this->data,
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
            $value['sync'] ?? null,
            $value['data'] ?? null,
            $value['created_at'] ?? now(),
            $value['updated_at'] ?? now(),
        );
    }
}
