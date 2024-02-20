<main>
    <header class="py-6">
        <div class="mx-auto flex max-w-7xl flex-wrap items-center gap-6 px-4 sm:flex-nowrap sm:px-6 lg:px-8">
            <h1 class="text-base font-semibold leading-7 text-gray-900">
                {{ $title }}
            </h1>

            <div
                class="order-last flex w-full gap-x-8 text-sm font-semibold leading-6 sm:order-none sm:w-auto sm:border-l sm:border-gray-200 sm:pl-6 sm:leading-7">
                <button type="button" x-on:click="isSearchPaletteOpen = !isSearchPaletteOpen" class="text-gray-700">
                    {{ __('Cari') }}
                </button>

                <x-search-palette />
            </div>

            @can('create classrooms')
                <x-anchor :href="route('classrooms.create')"
                    class="ml-auto flex items-center gap-x-1 rounded-md bg-primary px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-opacity-80">
                    <svg class="-ml-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path
                            d="M10.75 6.75a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z" />
                    </svg>
                    {{ __('Buat baru') }}
                </x-anchor>
            @endcan
        </div>
    </header>

    <div class="overflow-hidden border-t border-gray-100/90">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <table class="w-full text-left">
                <thead>
                    <tr class="text-sm leading-6 text-gray-900">
                        <th scope="colgroup" colspan="3" class="relative isolate py-2 font-semibold">
                            {{ __('Tabel') }}

                            <div
                                class="absolute inset-y-0 right-full -z-10 w-screen border-b border-gray-200 bg-gray-50">
                            </div>

                            <div class="absolute inset-y-0 left-0 -z-10 w-screen border-b border-gray-200 bg-gray-50">
                            </div>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <ul role="list" class="mb-6 lg:col-span-7 xl:col-span-8">
        @forelse ($classrooms as $classroom)
            <li class="relative" wire:key="{{ $classroom->uuid }}">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between gap-x-6 py-5">
                        <div class="min-w-0">
                            <p class="text-sm font-semibold leading-6 text-gray-900">
                                {{ $classroom->name }}
                            </p>

                            <div class="mt-1 flex items-center gap-x-2 text-xs leading-5 text-gray-500">
                                <p class="whitespace-nowrap">
                                    {{ __('Dibuat oleh :user', [
                                        'user' => $classroom->user->name,
                                    ]) }}
                                </p>

                                <svg viewBox="0 0 2 2" class="h-0.5 w-0.5 fill-current">
                                    <circle cx="1" cy="1" r="1" />
                                </svg>

                                <p class="truncate">
                                    {{ __('Dibuat pada :created_at WIB', [
                                        'created_at' => \Carbon\Carbon::parse($classroom->created_at)->isoFormat('DD MMMM YYYY HH:mm'),
                                    ]) }}
                                </p>
                            </div>
                        </div>

                        <div class="flex flex-none items-center gap-x-4">
                            @can('update classrooms')
                                <a href="{{ route('classrooms.edit', $classroom->uuid) }}"
                                    class="hidden rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block"
                                    wire:navigate>
                                    {{ __('Ubah detail') }}
                                </a>
                            @endcan

                            <div class="relative flex-none" x-data="{ isOptionMenuOpen: false }" x-id="['dropdown-button']">
                                <button type="button" x-ref="button" x-on:click="isOptionMenuOpen = !isOptionMenuOpen"
                                    class="-m-2.5 block text-gray-500 hover:text-gray-900">
                                    <span class="sr-only">
                                        {{ __('Buka menu opsi') }}
                                    </span>
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                                    </svg>
                                </button>

                                <div x-show="isOptionMenuOpen" x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95" x-show="isOptionMenuOpen"
                                    x-on:click.outside="isOptionMenuOpen = false" :id="$id('dropdown-button')"
                                    class="absolute right-0 z-10 mt-2 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" tabindex="-1">
                                    @can('update classrooms')
                                        <a href="{{ route('classrooms.edit', $classroom->uuid) }}"
                                            class="block sm:hidden px-3 py-1 text-sm leading-6 text-gray-900"
                                            role="menuitem" tabindex="-1" wire:navigate>
                                            {{ __('Ubah Detail') }}
                                        </a>
                                    @endcan

                                    @can('delete classrooms')
                                        <button type="button" wire:click="delete('{{ $classroom->uuid }}')"
                                            wire:confirm="Apakah Anda yakin ingin menghapus kelas ini?"
                                            class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem"
                                            tabindex="-1">
                                            {{ __('Hapus') }}
                                        </button>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="absolute bottom-0 right-0 h-px w-screen bg-gray-100"></div>
            </li>
        @empty
            <li class="relative">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-center gap-x-6 py-5">
                        <p class="text-sm text-gray-500">
                            {{ __('Tidak ditemukan data apapun.') }}
                        </p>
                    </div>
                </div>

                <div class="absolute bottom-0 right-0 h-px w-screen bg-gray-100"></div>
            </li>
        @endforelse
    </ul>

    {{ $classrooms->links() }}
</main>
