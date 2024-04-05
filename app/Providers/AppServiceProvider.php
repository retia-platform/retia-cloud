<?php

namespace App\Providers;

use App\Models\Synth\DetectorSynth;
use App\Models\Synth\DeviceAclSynth;
use App\Models\Synth\DeviceInterfaceSynth;
use App\Models\Synth\DeviceOspfSynth;
use App\Models\Synth\DeviceStaticRouteSynth;
use App\Models\Synth\DeviceSynth;
use App\Models\Synth\LogSynth;
use App\Models\Synth\UserSynth;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    protected array $synthesizers = [
        DeviceSynth::class,
        DeviceAclSynth::class,
        DeviceInterfaceSynth::class,
        DeviceOspfSynth::class,
        DeviceStaticRouteSynth::class,
        DetectorSynth::class,
        LogSynth::class,
        UserSynth::class,
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
