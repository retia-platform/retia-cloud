<?php

namespace App\Models\Synth;

use App\Models\User;
use App\Traits\DataBindable;
use Livewire\Mechanisms\HandleComponents\Synthesizers\Synth;

class UserSynth extends Synth
{
    use DataBindable;

    public static $key = 'user';

    public static function match($target)
    {
        return $target instanceof User;
    }

    public function hydrate(array $value)
    {
        return User::synth($value);
    }
}
