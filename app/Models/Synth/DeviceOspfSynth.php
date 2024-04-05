<?php

namespace App\Models\Synth;

use App\Models\DeviceOspf;
use App\Traits\DataBindable;
use Livewire\Mechanisms\HandleComponents\Synthesizers\Synth;

class DeviceOspfSynth extends Synth
{
    use DataBindable;

    public static $key = 'device_ospf';

    public static function match($target)
    {
        return $target instanceof DeviceOspf;
    }

    public function hydrate(array $value)
    {
        return DeviceOspf::synth($value);
    }
}
