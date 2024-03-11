<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet" />

    <!-- <link rel="preconnect" href="https://fonts.bunny.net"> -->
    <!-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> -->

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <x-navigation-menu />

        <!-- Page Heading -->
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:flex">
                        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                            <x-icon type="chart-bar-square" class="w-5 h-5 mr-2" />
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('devices') }}" :active="request()->routeIs('devices')">
                            <x-icon type="signal" class="w-5 h-5 mr-2" />
                            {{ __('Device') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('detectors') }}" :active="request()->routeIs('detectors')">
                            <x-icon type="eye" class="w-5 h-5 mr-2" />
                            {{ __('Detector') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('logs') }}" :active="request()->routeIs('logs')">
                            <x-icon type="document-text" class="w-5 h-5 mr-2" />
                            {{ __('Activity Log') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('users') }}" :active="request()->routeIs('users')">
                            <x-icon type="user-group" class="w-5 h-5 mr-2" />
                            {{ __('User') }}
                        </x-nav-link>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <span class="hidden text-gray-600"></span>
    <span class="hidden text-green-600"></span>
    <span class="hidden text-yellow-600"></span>
    <span class="hidden text-red-600"></span>

    @stack('modals')

    @livewireScripts
    @livewireChartsScripts
</body>

</html>
