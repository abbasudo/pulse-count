<?php

namespace Abbasudo\PulseCount\Livewire;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\DB;
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
     * @var mixed|null
     */
    public string $table;

    /**
     * Render the component.
     */
    public function render(): Renderable
    {
        [$count, $time, $runAt] = $this->remember(function () {
            return DB::table($this->table)->count();
        });

        if (Livewire::isLivewireRequest()) {
            $this->dispatch('count-update', count: $count);
        }

        return View::make('pulse-count::livewire.count', [
            'count' => $count,
            'time'  => $time,
            'runAt' => $runAt,
        ]);
    }
}
