<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;

class DeviceRepository
{
    public static function getAllDevices(
        int $amount = 0,
        int $retries = 0,
    ): array {
        $response = Http::withToken(auth()->user()?->retia_api_token)
            ->get(config('services.retia_api.url').'device');

        if ($response->status() === 401 && $retries < config('app.max_request_retries')) {
            auth()->user()?->refreshRetiaApiToken();

            return self::getAllDevices($amount, $retries++);
        }

        if ($response->status() !== 200) {
            $result = [
                ['hostname' => 'Device A', 'mgmt_ipaddr' => '127.0.0.1'],
                ['hostname' => 'Device B', 'mgmt_ipaddr' => '127.0.0.1'],
                ['hostname' => 'Device C', 'mgmt_ipaddr' => '127.0.0.1'],
                ['hostname' => 'Device D', 'mgmt_ipaddr' => '127.0.0.1'],
                ['hostname' => 'Device E', 'mgmt_ipaddr' => '127.0.0.1'],
                ['hostname' => 'Device F', 'mgmt_ipaddr' => '127.0.0.1'],
                ['hostname' => 'Device G', 'mgmt_ipaddr' => '127.0.0.1'],
                ['hostname' => 'Device H', 'mgmt_ipaddr' => '127.0.0.1'],
                ['hostname' => 'Device I', 'mgmt_ipaddr' => '127.0.0.1'],
                ['hostname' => 'Device J', 'mgmt_ipaddr' => '127.0.0.1'],
                ['hostname' => 'Device K', 'mgmt_ipaddr' => '127.0.0.1'],
                ['hostname' => 'Device L', 'mgmt_ipaddr' => '127.0.0.1'],
                ['hostname' => 'Device M', 'mgmt_ipaddr' => '127.0.0.1'],
                ['hostname' => 'Device N', 'mgmt_ipaddr' => '127.0.0.1'],
                ['hostname' => 'Device O', 'mgmt_ipaddr' => '127.0.0.1'],
            ];
        }

        $result = $response->json();

        if ($amount > 0) {
            $result = array_slice($result, 0, $amount);
        }

        return $response->json();
    }
}
