<?php

namespace App\Livewire\Device;

use App\Enums\DeviceBrand;
use App\Enums\DeviceType;
use App\Repositories\DeviceRepository;
use App\Traits\HasSessionError;
use Livewire\Component;

class Store2 extends Component
{
    use HasSessionError;

    public array $brands;

    public array $types;

    public string $name;

    public string $brand;

    public string $type;

    public string $ipAddress;

    public int $port;

    public string $username;

    public string $secret;

    public function store(DeviceRepository $deviceRepository)
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'brand' => 'required|string|in:'.implode(',', DeviceBrand::labels()),
            'type' => 'required|string|in:'.implode(',', DeviceType::labels()),
            'ipAddress' => 'required|string|ip',
            'port' => 'required|integer|min:1|max:65535',
            'username' => 'required|string|max:255',
            'secret' => 'required|string|min:4|max:255',
        ]);

        $device = $deviceRepository->createDevice([
            'name' => $this->name,
            'brand' => $this->brand,
            'type' => $this->type,
            'ip_address' => $this->ipAddress,
            'port' => $this->port,
            'username' => $this->username,
            'secret' => $this->secret,
        ]);

        if ($this->hasSessionError()) {
            return $this->getSessionError();
        }

        return redirect()->route('devices.store3', [
            'device' => $device->name,
        ]);
    }

    public function mount()
    {
        $this->brands = DeviceBrand::labelAndValues();
        $this->brand = $this->brands[0]['label'];
        $this->types = DeviceType::labelAndValues();
        $this->type = $this->types[0]['label'];
    }

    public function render()
    {
        return view('livewire.device.store-2');
    }
}
