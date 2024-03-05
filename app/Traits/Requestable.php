<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;

trait Requestable
{
    use Authorizable;
    use Formatable;

    public static function getResourceName(): string
    {
        return preg_replace('/([a-z])([A-Z])/s', '$1 $2', self::class);
    }

    private function authorizeThenCollect(
        Response $response,
        int $amount = 0, // 0 means all,
        string $resourceName = 'Resource',
    ): Collection {
        $this->authorize($response);

        if ($response->unauthorized()) {
            throw new Exception('Unauthorized');
        }

        if ($response->notFound()) {
            throw new Exception($resourceName.' not found');
        }

        if ($response->serverError()) {
            throw new Exception('Retia API is unreachable or error');
        }

        return $this->collect($response, $amount);
    }

    public function get(
        string $path,
        array $queryParams = [],
        int $amount = 0, // 0 means all,
        string $resourceName = 'Resource',
    ): Collection {
        $response = $this->withToken()->get(config('services.retia_api.url').$path, $queryParams);

        return $this->authorizeThenCollect($response, $amount, $resourceName);
    }

    public function post(
        string $path,
        array $body = [],
        int $amount = 0, // 0 means all,
        string $resourceName = 'Resource',
    ): Collection {
        $response = $this->withToken()->post(config('services.retia_api.url').$path, $body);

        return $this->authorizeThenCollect($response, $amount, $resourceName);
    }

    public function put(
        string $path,
        array $body = [],
        int $amount = 0, // 0 means all,
        string $resourceName = 'Resource',
    ): Collection {
        $response = $this->withToken()->put(config('services.retia_api.url').$path, $body);

        return $this->authorizeThenCollect($response, $amount, $resourceName);
    }

    public function delete(
        string $path,
        string $resourceName = 'Resource',
    ): Collection {
        $response = $this->withToken()->delete(config('services.retia_api.url').$path);

        return $this->authorizeThenCollect($response, resourceName: $resourceName);
    }
}
