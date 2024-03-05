<?php

namespace App\Models\Base;

use App\Traits\API;

class APIModel
{
    use API;

    public function fresh(): self
    {
        $this->refresh();

        return $this;
    }
}
