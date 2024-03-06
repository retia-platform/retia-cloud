<?php

namespace App\Models\Synth;

use App\Models\Base\APIModel;
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

    public function dehydrate(APIModel $target)
    {
        return $this->dehydrateFromApiModel($target);
    }

    public function hydrate(array $value)
    {
        return Device::synth($value);
    }
}
