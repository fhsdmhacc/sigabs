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

                <button type="button" wire:click="excel" class="text-gray-700">
                    {{ __('Unduh Format') }}
                </button>

                @can('create students')
                    <x-anchor :href="route('students.upload')" class="text-gray-700">
                        {{ __('Unggah') }}
                    </x-anchor>
                @endcan

                <x-search-palette />
            </div>

            <x-anchor :href="route('students.create')"
                class="ml-auto flex items-center gap-x-1 rounded-md bg-primary px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-opacity-80">
                <svg class="-ml-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path
                        d="M10.75 6.75a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z" />
                </svg>
                {{ __('Buat baru') }}
            </x-anchor>
        </div>
    </header>

    <x-table>
        @forelse ($students as $student)
            <x-table-column wire:key="{{ $student->uuid }}">
                <x-slot:left-column>
                    <div class="text-sm font-medium leading-6 text-gray-900 truncate">
                        {{ __(':name (:gender)', [
                            'name' => $student->name,
                            'gender' => $student->gender,
                        ]) }}
                    </div>

                    <div class="mt-1 text-xs leading-5 text-gray-500">
                        {{ $student->class }}
                    </div>
                </x-slot:left-column>

                <x-slot:middle-column>
                    <div class="text-sm leading-6 text-gray-900">
                        {{ __('Nomor Induk Siswa') }}
                    </div>

                    <div class="mt-1 text-xs leading-5 text-gray-500 truncate">
                        {{ $student->identification_number }}
                    </div>
                </x-slot:middle-column>

                <x-slot:right-column>
                    <div class="flex justify-end">
                        @can('update students')
                            <x-anchor :href="route('students.edit', $student->uuid)"
                                class="text-sm font-medium leading-6 text-primary-500 hover:text-secondary-500">
                                {{ __('Ubah Detail') }}
                            </x-anchor>
                        @endcan
                    </div>

                    <div class="mt-1 text-xs leading-5 text-gray-500 truncate">
                        {{ __(':created_at WIB', [
                            'created_at' => \Carbon\Carbon::parse($student->created_at)->isoFormat('dddd, DD MMMM YYYY HH:mm'),
                        ]) }}
                        </span>
                    </div>
                </x-slot:right-column>
            </x-table-column>
        @empty
            <tr class="relative grid grid-cols-1 py-5">
                <td class="text-sm text-center text-gray-500">
                    {{ __('Tidak ditemukan data apapun.') }}
                </td>

                <td class="absolute bottom-0 right-full h-px w-screen bg-gray-100"></td>

                <td class="absolute bottom-0 left-0 h-px w-screen bg-gray-100"></td>
            </tr>
        @endforelse
    </x-table>

    {{ $students->links() }}
</main>
