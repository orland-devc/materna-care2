{{-- \materna-care2\resources\views\components\layouts\app\sidebar.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <link rel="icon" href="{{ asset('images/assets/image-favicon.png') }}" type="image/x-icon" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap">
        @include('partials.head')
    </head>
    <style>
        body {
            font-family: poppins, sans-serif;
        }
    </style>
    <body class="min-h-screen bg-white dark:bg-gray-800">
        <flux:sidebar sticky stashable class="border-e border-gray-200 bg-gray-50 dark:border-gray-700 dark:bg-gray-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.item icon="tachograph-digital" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>{{ __('Dashboard') }} </flux:navlist.item>

                <flux:navlist.group :heading="__('Records & Services')" class="grid">
                    <flux:navlist.item icon="bed" :href="route('patient-records')" :current="str_contains(request()->path(), 'patient-records')" wire:navigate>
                        {{ __('Admission Records') }}
                    </flux:navlist.item>
                    {{-- <flux:navlist.item icon="stethoscope" :href="route('prenatal-care')" :current="request()->routeIs('prenatal-care')" wire:navigate>{{ __('Prenatal Care') }} </flux:navlist.item>
                    <flux:navlist.item icon="baby-carriage" :href="route('patient-record')" :current="request()->routeIs('patient-record')" wire:navigate>{{ __('Postnatal Care') }} </flux:navlist.item>
                    <flux:navlist.item icon="heart-pulse" :href="route('patient-record')" :current="request()->routeIs('patient-record')" wire:navigate>{{ __('Labor & Delivery') }} </flux:navlist.item> --}}
                    <flux:navlist.item icon="baby-carriage" :href="route('scoring-chart')" :current="str_contains(request()->path(), 'scoring-chart')" wire:navigate>{{ __('APGAR Chart Records') }} </flux:navlist.item>
                    <flux:navlist.item icon="calendar-check" :href="route('patient-record')" :current="request()->routeIs('patient-record')" wire:navigate>{{ __('Appointments') }} </flux:navlist.item>
                </flux:navlist.group>

                <flux:navlist.group :heading="__('Administration')" class="grid">
                    <flux:navlist.item icon="boxes-packing" :href="route('patient-record')" :current="request()->routeIs('patient-record')" wire:navigate>{{ __('Inventory') }} </flux:navlist.item>
                    <flux:navlist.item icon="user-doctor" :href="route('patient-record')" :current="request()->routeIs('patient-record')" wire:navigate>{{ __('Staff Management') }} </flux:navlist.item>
                    <flux:navlist.item icon="wallet" :href="route('patient-record')" :current="request()->routeIs('patient-record')" wire:navigate>{{ __('Billing') }} </flux:navlist.item>
                    <flux:navlist.item icon="chart-line" :href="route('patient-record')" :current="request()->routeIs('patient-record')" wire:navigate>{{ __('Reports & Analytics') }} </flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            {{-- <flux:navlist variant="outline">
                <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                {{ __('Repository') }}
                </flux:navlist.item>

                <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire" target="_blank">
                {{ __('Documentation') }}
                </flux:navlist.item>
            </flux:navlist> --}}

            <!-- Desktop User Menu -->
            <flux:dropdown position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
