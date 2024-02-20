<div class="relative z-10" role="dialog" aria-modal="true">
    <div x-show="isSearchPaletteOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div x-show="isSearchPaletteOpen" class="fixed inset-0 z-10 w-screen overflow-y-auto p-4 sm:p-6 md:p-20">
        <div x-show="isSearchPaletteOpen" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95" x-on:click.outside="isSearchPaletteOpen = false"
            class="mx-auto max-w-xl transform divide-y divide-gray-100 overflow-hidden rounded-xl bg-white shadow-2xl ring-1 ring-black ring-opacity-5 transition-all">
            <div class="relative">
                <svg class="pointer-events-none absolute left-4 top-3.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                        clip-rule="evenodd" />
                </svg>

                <input type="text" wire:model.live.debounce.500ms="search" x-trap="isSearchPaletteOpen"
                    @keydown.enter="isSearchPaletteOpen = false"
                    class="h-12 w-full border-0 bg-transparent pl-11 pr-4 text-gray-900 font-normal placeholder:text-gray-400 focus:ring-0 sm:text-sm"
                    placeholder="{{ __('Cari sesuatu') }}" role="combobox" aria-expanded="false" aria-controls="options"
                    autocomplete="off">
            </div>
        </div>
    </div>
</div>
