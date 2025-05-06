<x-layouts.app.sidebar :title="$title ?? null">
    <link rel="icon" type="image/png" href="{{ asset('images/assets/image-favicon.png') }}">
    <flux:main>
        {{ $slot }}
    </flux:main>
</x-layouts.app.sidebar>
