<?php

namespace App\Traits;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

trait Authorizable
{
    public static function withToken(): PendingRequest
    {
        return Http::withToken(auth()->user()?->retia_api_token);
    }

    public static function authorize(Response $response)
    {
        if ($response->unauthorized()) {
            auth()->user()?->refreshRetiaApiToken();
        }

        return redirect()->back();
    }
}
