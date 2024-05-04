<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Preconnects -->
    <link rel="preconnect" href="{{ config('app.url') }}" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://static.cloudflareinsights.com" crossorigin />
    <link rel="preconnect" href="https://cloudflareinsights.com" crossorigin />

    <!-- Fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" />

    <!-- Livewire -->
    @livewireStyles
    @livewireScripts
    @livewireChartsScripts

    <!-- Scripts -->
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
    @vite('resources/css/app.css')
    @if (app()->environment('production'))
        @once
            <script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-spa="auto"
                data-cf-beacon='{"token": "83fc6447285a42cd8d3d6ad10f4dac0a"}'></script>
        @endonce
    @endif
</head>


<body class="font-sans antialiased">
    <div class="font-sans text-gray-900 dark:text-gray-100 antialiased">
        {{ $slot }}
    </div>
</body>

</html>
