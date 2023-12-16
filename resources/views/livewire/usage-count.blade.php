<x-pulse::card :cols="$cols" :rows="$rows" :class="$class">
    <x-pulse::card-header
            name="Usage Distribution"
            title="Time: {{ number_format($time) }}ms; Run at: {{ $runAt }};"
            details="past 7 days"
    >
        <x-slot:icon>
            <x-pulse::icons.clock/>
        </x-slot:icon>
    </x-pulse::card-header>

</x-pulse::card>

@script
<script>
  Alpine.data('usageChart', (config) => ({
    init() {


      Livewire.on('count-update', ({ count }) => {

      })
    },
  }))
</script>
@endscript
