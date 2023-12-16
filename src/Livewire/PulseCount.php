<?php

namespace Abbasudo\PulseCount\Livewire;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\View;
use Laravel\Pulse\Livewire\Card;
use Laravel\Pulse\Livewire\Concerns;
use Livewire\Attributes\Lazy;
use Livewire\Livewire;

/**
 * @internal
 */
#[Lazy]
class PulseCount extends Card
{
    use Concerns\HasPeriod, Concerns\RemembersQueries;

    /**
     * Render the component.
     */
    public function render(): Renderable
    {
        [$count, $time, $runAt] = $this->remember(function () {
            return 7;
        });

        if (Livewire::isLivewireRequest()) {
            $this->dispatch('usage-hours-update', count: $count);
        }

        return View::make('pulse-count::livewire.usage-count', [
            'count' => $count,
            'time'  => $time,
            'runAt' => $runAt,
        ]);
    }
}
