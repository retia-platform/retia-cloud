<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\Client\Response;
use Illuminate\Http\RedirectResponse;
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
        bool $breakWhenNotFound = true,
    ): Collection {
        $this->authorize($response);

        if ($response->unauthorized()) {
            throw new Exception('Unauthorized');
        }

        if ($breakWhenNotFound && $response->notFound()) {
            throw new Exception($resourceName.' not found');
        }

        if ($response->serverError()) {
            throw new Exception('Retia API is unreachable or error');
        }

        return $this->collect($response, $amount);
    }

    public function get(
        string $path,
        int $amount = 0, // 0 means all,
        string $resourceName = 'Resource',
    ): Collection {
        $response = $this->withToken()->get(config('services.retia_api.url').$path);

        return $this->authorizeThenCollect($response, $amount, $resourceName, false);
    }

    public function post(
        string $path,
        array $body = [],
        int $amount = 0, // 0 means all,
        string $resourceName = 'Resource',
    ): Collection|RedirectResponse {
        $response = $this->withToken()->asJson()->post(config('services.retia_api.url').$path, $body);

        $body = json_decode($response->body());

        if (json_last_error() === JSON_ERROR_NONE && ! empty($body->error)) {
            session()->flash('errors', array_map(fn ($error) => $error[0], (array) $body->error));
        }

        return $this->authorizeThenCollect($response, $amount, $resourceName, false);
    }

    public function put(
        string $path,
        array $body = [],
        int $amount = 0, // 0 means all,
        string $resourceName = 'Resource',
    ): Collection {
        $response = $this->withToken()->asJson()->put(config('services.retia_api.url').$path, $body);

        $body = json_decode($response->body());

        if (json_last_error() === JSON_ERROR_NONE && ! empty($body->error)) {
            session()->flash('errors', array_map(fn ($error) => $error[0], (array) $body->error));
        }

        return $this->authorizeThenCollect($response, $amount, $resourceName, false);
    }

    public function delete(
        string $path,
        string $resourceName = 'Resource',
    ): Collection {
        $response = $this->withToken()->delete(config('services.retia_api.url').$path);

        return $this->authorizeThenCollect($response, resourceName: $resourceName, breakWhenNotFound: false);
    }
}
