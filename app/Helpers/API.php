<?php

namespace App\Helpers;

use App\Traits\Requestable;

class API
{
    use Requestable;

    public static function boot(): self
    {
        return app(API::class);
    }
}
