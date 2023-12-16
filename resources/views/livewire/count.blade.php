<x-pulse::card :cols="$cols" :rows="$rows" :class="$class">
    <x-pulse::card-header
            name="{{str($table)->ucfirst()}} Count"
            title="Time: {{ number_format($time) }}ms; Run at: {{ $runAt }};"
    >
        <x-slot:icon>
            <x-pulse::icons.information-circle/>
        </x-slot:icon>
    </x-pulse::card-header>
    <div class="w-20 h-20 rounded-full border-2 border-black flex justify-center items-center">
        <p>404</p>
    </div>
</x-pulse::card>

@script
<script>

</script>
@endscript
