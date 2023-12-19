<div class="relative isolate">
    <header class="absolute inset-x-0 top-0 z-50" x-data="{ isMobileMenuOpen: false }">
        <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <x-anchor :href="route('index')" class="-m-1.5 p-1.5">
                    <span class="sr-only">
                        {{ config('app.name') }}
                    </span>

                    <x-application-logo class="h-8 w-auto" />
                </x-anchor>
            </div>

            <div class="flex lg:hidden">
                <button type="button" x-on:click="isMobileMenuOpen = !isMobileMenuOpen"
                    class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">
                        {{ __('Buka menu') }}
                    </span>

                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>

            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <x-anchor :href="route('login')" class="text-sm font-semibold leading-6 text-gray-900">
                    {{ __('Masuk') }}
                    <span aria-hidden="true">&rarr;</span>
                </x-anchor>
            </div>
        </nav>

        <div x-show="isMobileMenuOpen" class="lg:hidden" role="dialog" aria-modal="true">
            <div x-show="isMobileMenuOpen" class="fixed inset-0 z-50"></div>
            <div
                class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between">
                    <x-anchor :href="route('index')" class="-m-1.5 p-1.5">
                        <span class="sr-only">
                            {{ config('app.name') }}
                        </span>

                        <x-application-logo class="h-8 w-auto" />
                    </x-anchor>

                    <button type="button" x-on:click="isMobileMenuOpen = !isMobileMenuOpen"
                        class="-m-2.5 rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">
                            {{ __('Tutup menu') }}
                        </span>

                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="py-6">
                            <x-anchor :href="route('login')"
                                class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">
                                {{ __('Masuk') }}
                            </x-anchor>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <x-pattern class="pt-14">
        <div class="mx-auto max-w-7xl px-6 lg:px-8 py-24 sm:py-32">
            <div class="mx-auto max-w-2xl text-center">
                <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
                    {{ config('app.title') }}
                </h1>

                <p class="mt-6 text-lg leading-8 text-gray-600">
                    {{ config('app.description') }}
                </p>

                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <x-anchor :href="route('register')"
                        class="rounded-md bg-primary px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-opacity-80">
                        {{ __('Mulai sekarang') }}
                    </x-anchor>

                    <x-anchor href="#" class="text-sm font-semibold leading-6 text-gray-900">
                        {{ __('Lihat hasil') }}
                        <span aria-hidden="true">→</span>
                    </x-anchor>
                </div>
            </div>

            <div class="mt-16 flow-root sm:mt-24">
                <div
                    class="-m-2 rounded-xl bg-gray-900/5 p-2 ring-1 ring-inset ring-gray-900/10 lg:-m-4 lg:rounded-2xl lg:p-4">
                    <img src="https://tailwindui.com/img/component-images/project-app-screenshot.png"
                        alt="{{ __('App screenshot') }}" width="2432" height="1442"
                        class="rounded-md shadow-2xl ring-1 ring-gray-900/10">
                </div>
            </div>
        </div>
    </x-pattern>
</div>
