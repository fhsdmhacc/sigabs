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

    <div class="overflow-hidden border-t border-gray-100/90 mb-6">
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

                <tbody>
                    @forelse ($classrooms as $classroom)
                        <tr wire:key="{{ $classroom->uuid }}"
                            class="relative grid grid-cols-2 sm:grid-cols-3 py-5 gap-x-6">
                            <td>
                                <div class="flex sm:space-x-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="hidden h-6 w-5 flex-none text-gray-400 sm:block">
                                        <path fill-rule="evenodd"
                                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                                            clip-rule="evenodd" />
                                    </svg>

                                    <div>
                                        <div class="flex items-start gap-x-3">
                                            <div class="text-sm font-medium leading-6 text-gray-900 truncate">
                                                {{ $classroom->name }}
                                            </div>
                                        </div>

                                        <div class="mt-1 text-xs leading-5 text-gray-500">
                                            {{ __(':count siswa', [
                                                'count' => $classroom->students->count(),
                                            ]) }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="hidden sm:table-cell">
                                <div class="text-sm leading-6 text-gray-900">
                                    {{ __('Tipe Gaya Belajar') }}
                                </div>

                                <div class="mt-1 text-xs leading-5 text-gray-500">
                                    {{ __('Visual :visual%, Auditori :auditory%, Kinestetik :kinesthetic%', [
                                        'visual' => Number::format(
                                            ($classroom->students->sum('result.visual') * 100) / (30 * $classroom->students->count()),
                                            2,
                                        ),
                                        'auditory' => Number::format(
                                            ($classroom->students->sum('result.auditory') * 100) / (30 * $classroom->students->count()),
                                            2,
                                        ),
                                        'kinesthetic' => Number::format(
                                            ($classroom->students->sum('result.kinesthetic') * 100) / (30 * $classroom->students->count()),
                                            2,
                                        ),
                                    ]) }}
                                </div>
                            </td>

                            <td class="text-right">
                                <div class="flex justify-end">
                                    @can('read classrooms')
                                        <x-anchor :href="route('results.show', $classroom->uuid)"
                                            class="text-sm font-medium leading-6 text-primary-500 hover:text-secondary-500">
                                            {{ __('Lihat Detail') }}
                                        </x-anchor>
                                    @endcan
                                </div>

                                <div class="mt-1 text-xs leading-5 text-gray-500 truncate">
                                    {{ __(':created_at WIB', [
                                        'created_at' => \Carbon\Carbon::parse($classroom->created_at)->isoFormat('dddd, DD MMMM YYYY HH:mm'),
                                    ]) }}
                                    </span>
                                </div>
                            </td>

                            <td class="absolute bottom-0 right-full h-px w-screen bg-gray-100"></td>
                            <td class="absolute bottom-0 left-0 h-px w-screen bg-gray-100"></td>
                        </tr>
                    @empty
                        <tr class="relative grid grid-cols-1 py-5">
                            <td class="text-sm text-center text-gray-500">
                                {{ __('Tidak ditemukan data apapun.') }}
                            </td>

                            <td class="absolute bottom-0 right-full h-px w-screen bg-gray-100"></td>

                            <td class="absolute bottom-0 left-0 h-px w-screen bg-gray-100"></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{ $classrooms->links() }}
</main>
