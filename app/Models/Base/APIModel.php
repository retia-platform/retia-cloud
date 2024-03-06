<?php

namespace App\Models\Base;

use App\Interfaces\APIContract;
use App\Traits\API;

abstract class APIModel implements APIContract
{
    use API;

    public function fresh(): self
    {
        $this->refresh();

        return $this;
    }
}
