<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Appearance')" :subheading=" __('Update the appearance settings for your account')">
        <flux:radio.group x-data variant="segmented" x-model="$flux.appearance">
            <flux:radio value="light" icon="sun" icon:color="text-amber-500">{{ __('Light') }}</flux:radio>
            <flux:radio value="dark" icon="moon" icon:color="text-blue-400">{{ __('Dark') }}</flux:radio>
            <flux:radio value="system" icon="computer-desktop" icon:color="text-emerald-500">{{ __('System') }}</flux:radio>
        </flux:radio.group>
    </x-settings.layout>
</section>
