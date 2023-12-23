<div x-data="{ isOffCanvasMenuOpen: false }">
    <div x-show="isOffCanvasMenuOpen" class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
        <div x-show="isOffCanvasMenuOpen" x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black bg-opacity-25"></div>

        <div class="fixed inset-0 z-40 flex">
            <div x-show="isOffCanvasMenuOpen" x-transition:enter="transition ease-in-out duration-300 transform"
                x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in-out duration-300 transform"
                x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
                class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-white pb-12 shadow-xl">
                <div class="flex px-4 pb-2 pt-5">
                    <button type="button" x-on:click="isOffCanvasMenuOpen = !isOffCanvasMenuOpen"
                        class="-m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400">
                        <span class="sr-only">
                            {{ __('Tutup menu') }}
                        </span>

                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="space-y-6 px-4 py-6 mt-2">
                    <div class="flow-root h-full">
                        <x-anchor :href="route('students.index')" x-data="{ isActive: {{ request()->routeIs('students.*') ? 'true' : 'false' }} }" class="-m-2 block p-2 font-medium"
                            x-bind:class="isActive ? 'text-primary' : 'text-gray-900'">
                            <span x-bind:class="isActive && 'bg-primary'"
                                class="absolute inset-x-0 bottom-0 h-0.5 transition-colors duration-200 ease-out mt-5 translate-y-px transform"
                                aria-hidden="true"></span>
                            {{ __('Siswa') }}
                        </x-anchor>

                        <x-anchor :href="route('results.index')" x-data="{ isActive: {{ request()->routeIs('results.*') ? 'true' : 'false' }} }" class="-m-2 block p-2 font-medium"
                            x-bind:class="isActive ? 'text-primary' : 'text-gray-900'">
                            <span x-bind:class="isActive && 'bg-primary'"
                                class="absolute inset-x-0 bottom-0 h-0.5 transition-colors duration-200 ease-out mt-5 translate-y-px transform"
                                aria-hidden="true"></span>
                            {{ __('Hasil') }}
                        </x-anchor>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <header class="relative">
        <nav aria-label="Top">
            <div class="border-b border-gray-200">
                <div class="flex h-16 items-center justify-between mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="hidden lg:flex lg:flex-1 lg:h-full">
                        <x-anchor :href="route('home')" x-data="{ isActive: {{ request()->routeIs('home') ? 'true' : 'false' }} }" x-bind:class="isActive && 'text-primary'"
                            class="relative z-10 flex items-center justify-center">
                            <span x-bind:class="isActive && 'bg-primary'"
                                class="absolute inset-x-0 bottom-0 h-0.5 transition-colors duration-200 ease-out mt-5 translate-y-px transform"
                                aria-hidden="true"></span>

                            <span class="sr-only">
                                {{ config('app.name') }}
                            </span>

                            <x-application-logo class="h-8 w-auto" />
                        </x-anchor>
                    </div>

                    <div class="hidden h-full lg:flex">
                        <div class="inset-x-0 bottom-0 px-4">
                            <div class="flex h-full justify-center space-x-8">
                                <x-anchor :href="route('students.index')" x-data="{ isActive: {{ request()->routeIs('students.*') ? 'true' : 'false' }} }"
                                    x-bind:class="isActive && 'text-primary'"
                                    class="relative z-10 flex items-center justify-center font-medium text-sm">
                                    <span x-bind:class="isActive && 'bg-primary'"
                                        class="absolute inset-x-0 bottom-0 h-0.5 transition-colors duration-200 ease-out mt-5 translate-y-px transform"
                                        aria-hidden="true"></span>
                                    {{ __('Siswa') }}
                                </x-anchor>

                                <x-anchor :href="route('results.index')" x-data="{ isActive: {{ request()->routeIs('results.*') ? 'true' : 'false' }} }"
                                    x-bind:class="isActive && 'text-primary'"
                                    class="relative z-10 flex items-center justify-center font-medium text-sm">
                                    <span x-bind:class="isActive && 'bg-primary'"
                                        class="absolute inset-x-0 bottom-0 h-0.5 transition-colors duration-200 ease-out mt-5 translate-y-px transform"
                                        aria-hidden="true"></span>
                                    {{ __('Hasil') }}
                                </x-anchor>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-1 items-center lg:hidden">
                        <button type="button" x-on:click="isOffCanvasMenuOpen = !isOffCanvasMenuOpen"
                            class="-ml-2 rounded-md p-2 text-gray-400">
                            <span class="sr-only">
                                {{ __('Buka menu') }}
                            </span>

                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex h-full">
                        <x-anchor :href="route('home')" x-data="{ isActive: {{ request()->routeIs('home') ? 'true' : 'false' }} }" x-bind:class="isActive && 'text-primary'"
                            class="relative z-10 flex items-center justify-center lg:hidden">
                            <span x-bind:class="isActive && 'bg-primary'"
                                class="absolute inset-x-0 bottom-0 h-0.5 transition-colors duration-200 ease-out mt-5 translate-y-px transform"
                                aria-hidden="true"></span>

                            <span class="sr-only">
                                {{ config('app.name') }}
                            </span>

                            <x-application-logo class="h-8 w-auto" />
                        </x-anchor>
                    </div>

                    <div class="flex flex-1 items-center justify-end h-full">
                        <div class="ml-4 flow-root lg:ml-8 h-full">
                            <x-anchor href="#" x-data="{ isActive: {{ request()->routeIs('#') ? 'true' : 'false' }} }"
                                class="relative z-10 flex items-center justify-center h-full"
                                x-bind:class="isActive ? 'text-primary' : 'text-gray-400'">
                                <span x-bind:class="isActive && 'bg-primary'"
                                    class="absolute inset-x-0 bottom-0 h-0.5 transition-colors duration-200 ease-out mt-5 translate-y-px transform"
                                    aria-hidden="true"></span>

                                <span class="sr-only">
                                    {{ __('Akun') }}
                                </span>

                                <x-icon name="user" class="h-6 w-6" outline />
                            </x-anchor>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</div>
