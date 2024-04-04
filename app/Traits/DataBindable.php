<?php

namespace App\Traits;

use App\Models\Base\APIModel;

trait DataBindable
{
    public function dehydrate(APIModel $target)
    {
        return $this->dehydrateFromApiModel($target);
    }

    public function dehydrateFromApiModel(APIModel $target)
    {
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
