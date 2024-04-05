<?php

namespace App\Models\Synth;

use App\Models\DeviceAcl;
use App\Traits\DataBindable;
use Livewire\Mechanisms\HandleComponents\Synthesizers\Synth;

class DeviceAclSynth extends Synth
{
    use DataBindable;

    public static $key = 'device_acl';

    public static function match($target)
    {
        return $target instanceof DeviceAcl;
    }

    public function hydrate(array $value)
    {
        return DeviceAcl::synth($value);
    }
}
