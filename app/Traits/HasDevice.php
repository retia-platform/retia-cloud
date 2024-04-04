<?php

namespace App\Traits;

use App\Models\Device;
use App\Repositories\DeviceRepository;

trait HasDevice
{
    public Device $device;

    public function populateDevice()
    {
        $deviceRepository = app(DeviceRepository::class);

        $this->device = $deviceRepository->getDevice(request()->input('device'));

        if (empty($this->device)) {
            return redirect()->route('devices.store1');
        }
    }
}
