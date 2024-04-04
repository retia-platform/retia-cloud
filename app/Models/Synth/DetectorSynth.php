<?php

namespace App\Models\Synth;

use App\Models\Detector;
use App\Traits\DataBindable;
use Livewire\Mechanisms\HandleComponents\Synthesizers\Synth;

class DetectorSynth extends Synth
{
    use DataBindable;

    public static $key = 'detector';

    public static function match($target)
    {
        return $target instanceof Detector;
    }

    public function hydrate(array $value)
    {
        return Detector::synth($value);
    }
}
