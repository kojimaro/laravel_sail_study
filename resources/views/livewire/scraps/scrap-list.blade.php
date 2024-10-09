<div>
    <div class="flex justify-center mb-10">
        <livewire:scraps.create-scrap />
    </div>
    <div class="grid grid-cols-4 gap-4">
        @foreach ($scraps as $scrap)
            <div class="rounded shadow-lg bg-white">{{ $scrap->id }} {{ $scrap->body }}</div>
        @endforeach
    </div>
</div>
