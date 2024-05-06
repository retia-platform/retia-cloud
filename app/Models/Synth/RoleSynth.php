<?php

namespace App\Models\Synth;

use App\Traits\DataBindable;
use Livewire\Mechanisms\HandleComponents\Synthesizers\Synth;
use Spatie\Permission\Models\Role;

class RoleSynth extends Synth
{
    use DataBindable;

    public static $key = 'role';

    public static function match($target)
    {
        return $target instanceof Role;
    }

    public function hydrate(array $value)
    {
        return new Role([
            'id' => $value['id'],
            'name' => $value['name'],
            'guard_name' => $value['guard_name'],
            'created_at' => $value['created_at'],
            'updated_at' => $value['updated_at'],
        ]);
    }
}
