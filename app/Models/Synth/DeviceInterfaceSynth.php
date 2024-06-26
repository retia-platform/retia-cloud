<?php

namespace App\Models\Synth;

use App\Models\DeviceInterface;
use App\Traits\DataBindable;
use Livewire\Mechanisms\HandleComponents\Synthesizers\Synth;

class DeviceInterfaceSynth extends Synth
{
    use DataBindable;

    public static $key = 'device_interface';

    public static function match($target)
    {
        return $target instanceof DeviceInterface;
    }

    public function hydrate(array $value)
    {
        return DeviceInterface::synth($value);
    }
}
