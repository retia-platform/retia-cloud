<?php

namespace App\Livewire\Device;

use App\Models\Device;
use App\Repositories\DeviceRepository;
use App\Traits\HasSessionError;
use Livewire\Component;

class Store5 extends Component
{
    use HasSessionError;

    public Device $device;

    public function mount(DeviceRepository $deviceRepository)
    {
        $name = request()->input('device');

        $this->device = $deviceRepository->getDevice($name);

        if (empty($this->device)) {
            return redirect()->route('devices.store1');
        }
    }

    public function render()
    {
        return view('livewire.device.store-5');
    }
}
