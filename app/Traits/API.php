<?php

namespace App\Traits;

use App\Helpers\API as RetiaAPI;

trait API
{
    use Resourceable;

    public static function api(): RetiaAPI
    {
        return app(RetiaAPI::class);
    }
}
