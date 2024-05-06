<?php

namespace App\Traits;

trait DataBindable
{
    public function dehydrate(
        \App\Models\Base\APIModel|
        \App\Models\User|
        \Spatie\Permission\Models\Role $target
    ) {
        return $this->dehydrateFromApiModel($target);
    }

    public function dehydrateFromApiModel(
        \App\Models\Base\APIModel|
        \App\Models\User|
        \Spatie\Permission\Models\Role $target
    ) {
        return [$target->toArray(), []];
    }

    public function get(&$target, $key)
    {
        return $target->{$key};
    }

    public function set(&$target, $key, $value)
    {
        $target->{$key} = $value;
    }
}
