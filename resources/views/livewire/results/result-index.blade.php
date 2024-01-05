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
                        {{ __('Tipe Gaya Belajar') }}
                    </div>

                    <div class="mt-1 text-xs leading-5 text-gray-500">
                        {{-- @if ($student->results->get(2)->total - $student->results->get(0)->total <= 4)
                            @foreach ($student->results->sortByDesc('total') as $result)
                                {{ $result->type->label }}
                            @endforeach
                        @elseif($student->results->get(2)->total - $student->results->get(1)->total <= 4)
                            @foreach ($student->results->sortByDesc('total') as $result)
                                {{ $result->type->label }}
                            @endforeach
                        @else
                            @foreach ($student->results->sortByDesc('total') as $result)
                                {{ $result->type->label }}
                            @endforeach
                        @endif --}}
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
