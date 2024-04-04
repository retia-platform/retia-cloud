<?php

namespace App\Providers;

use App\Models\Synth\DetectorSynth;
use App\Models\Synth\DeviceInterfaceSynth;
use App\Models\Synth\DeviceSynth;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    protected array $synthesizers = [
        DeviceSynth::class,
        DeviceInterfaceSynth::class,
        DetectorSynth::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        foreach ($this->synthesizers as $synthesizer) {
            Livewire::propertySynthesizer($synthesizer);
        }
    }
}
