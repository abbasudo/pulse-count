<?php

namespace Abbasudo\PulseCount;

use Abbasudo\PulseCount\Livewire\PulseCount;
use Illuminate\Contracts\Foundation\Application;
use Livewire\LivewireManager;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PulseCountServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('pulse-count')
            ->hasViews('pulse-count');
    }

    public function boot(): void
    {
        parent::boot();

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'pulse-count');

        $this->callAfterResolving('livewire', function (LivewireManager $livewire, Application $app) {
            $livewire->component('pulse.count', PulseCount::class);
        });
    }
}
