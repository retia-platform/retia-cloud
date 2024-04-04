<?php

namespace App\Models\Synth;

use App\Models\Device;
use App\Traits\DataBindable;
use Livewire\Mechanisms\HandleComponents\Synthesizers\Synth;

class DeviceSynth extends Synth
{
    use DataBindable;

    public static $key = 'device';

    public static function match($target)
    {
        return $target instanceof Device;
    }

    public function hydrate(array $value)
    {
        return Device::synth($value);
    }
}
