<?php

namespace App\Models\Synth;

use App\Models\DeviceStaticRoute;
use App\Traits\DataBindable;
use Livewire\Mechanisms\HandleComponents\Synthesizers\Synth;

class DeviceStaticRouteSynth extends Synth
{
    use DataBindable;

    public static $key = 'device_static_route';

    public static function match($target)
    {
        return $target instanceof DeviceStaticRoute;
    }

    public function hydrate(array $value)
    {
        return DeviceStaticRoute::synth($value);
    }
}
