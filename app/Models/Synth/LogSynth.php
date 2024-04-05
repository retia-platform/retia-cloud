<?php

namespace App\Models\Synth;

use App\Models\Log;
use App\Traits\DataBindable;
use Livewire\Mechanisms\HandleComponents\Synthesizers\Synth;

class LogSynth extends Synth
{
    use DataBindable;

    public static $key = 'log';

    public static function match($target)
    {
        return $target instanceof Log;
    }

    public function hydrate(array $value)
    {
        return Log::synth($value);
    }
}
