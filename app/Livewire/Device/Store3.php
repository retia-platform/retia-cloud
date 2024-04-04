<?php

namespace App\Livewire\Device;

use App\Models\Device;
use App\Models\DeviceInterface;
use App\Repositories\DeviceRepository;
use App\Traits\HasSessionError;
use Illuminate\Support\Collection;
use Livewire\Component;

class Store3 extends Component
{
    use HasSessionError;

    public Device $device;

    public DeviceInterface $interface;

    public Collection $interfaces;

    public string $name;

    public string $type;

    public string $ipAddress;

    public string $netmask;

    public bool $enabled;

    public bool $running;

    public function populate()
    {
        $this->interface = $this->device->findInterface($this->name);

        if (empty($this->interface)) {
            return $this->addError('name', 'Cannot get the data from this interface!');
        }

        $this->name = $this->interface->name;

        $this->type = $this->interface->type ?? '';

        $this->ipAddress = $this->interface->ipAddress ?? '';

        $this->netmask = $this->interface->netmask ?? '';

        $this->enabled = $this->interface->enabled ?? false;

        $this->running = $this->interface->running ?? false;
    }

    public function mount(DeviceRepository $deviceRepository)
    {
        $this->device = $deviceRepository->getDevice(request()->input('device'));

        if (empty($this->device)) {
            return redirect()->route('devices.store1');
        }

        $this->interfaces = $this->device->getInterfaces();

        $this->name = $this->interfaces->first()->name;

        $this->populate();
    }

    public function render()
    {
        return view('livewire.device.store-3');
    }
}
