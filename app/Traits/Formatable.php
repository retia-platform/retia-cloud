<?php

namespace App\Traits;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;

trait Formatable
{
    public static function collect(
        Response $response,
        int $amount = 0, // 0 means all
    ): Collection {
        $result = $response->status() === 200 ? $response->json() : [];

        if (array_key_exists('body', $result)) {
            return collect($result['body']);
        }

        if ($amount > 0) {
            $result = array_slice($result, 0, $amount);
        }

        return collect($result);
    }
}
