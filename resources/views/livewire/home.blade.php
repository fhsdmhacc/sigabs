<main>
    <div class="relative isolate overflow-hidden">
        <header class="pb-4 pt-6 sm:pb-6">
            <div class="mx-auto flex max-w-7xl flex-wrap items-center gap-6 px-4 sm:flex-nowrap sm:px-6 lg:px-8">
                <h1 class="text-base font-semibold leading-7 text-gray-900">
                    {{ __('Ringkasan Statistik') }}
                </h1>
            </div>
        </header>

        <div class="border-b border-b-gray-900/10 lg:border-t lg:border-t-gray-900/5">
            <dl class="mx-auto grid max-w-7xl grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 lg:px-2 xl:px-0">
                <div
                    class="flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8">
                    <dt class="text-sm font-medium leading-6 text-gray-500">
                        {{ __('Siswa Sudah Mengisi Tes') }}
                    </dt>
                    <dd class="text-xs font-medium text-gray-700">+4.75%</dd>
                    <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">
                        {{ $test_completed }}
                    </dd>
                </div>
                <div
                    class="flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8 sm:border-l">
                    <dt class="text-sm font-medium leading-6 text-gray-500">
                        {{ __('Siswa Belum Mengisi Tes') }}
                    </dt>
                    <dd class="text-xs font-medium text-rose-600">+54.02%</dd>
                    <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">
                        {{ $test_uncompleted }}
                    </dd>
                </div>
                <div
                    class="flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8 lg:border-l">
                    <dt class="text-sm font-medium leading-6 text-gray-500">
                        {{ __('Jumlah Guru') }}
                    </dt>
                    <dd class="text-xs font-medium text-gray-700">-1.39%</dd>
                    <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">
                        {{ $teacher }}
                    </dd>
                </div>
                <div
                    class="flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8 sm:border-l">
                    <dt class="text-sm font-medium leading-6 text-gray-500">
                        {{ __('Jumlah Siswa') }}
                    </dt>
                    <dd class="text-xs font-medium text-rose-600">+10.18%</dd>
                    <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">
                        {{ $student }}
                    </dd>
                </div>
            </dl>
        </div>

        <div class="absolute left-0 top-full -z-10 mt-96 origin-top-left translate-y-40 -rotate-90 transform-gpu opacity-20 blur-3xl sm:left-1/2 sm:-ml-96 sm:-mt-10 sm:translate-y-0 sm:rotate-0 sm:transform-gpu sm:opacity-50"
            aria-hidden="true">
            <div class="aspect-[1154/678] w-[72.125rem] bg-gradient-to-br from-[#FF80B5] to-[#9089FC]"
                style="clip-path: polygon(100% 38.5%, 82.6% 100%, 60.2% 37.7%, 52.4% 32.1%, 47.5% 41.8%, 45.2% 65.6%, 27.5% 23.4%, 0.1% 35.3%, 17.9% 0%, 27.7% 23.4%, 76.2% 2.5%, 74.2% 56%, 100% 38.5%)">
            </div>
        </div>
    </div>

    <div class="space-y-16 py-16 xl:space-y-20">
        <div>
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h2 class="mx-auto max-w-2xl text-base font-semibold leading-6 text-gray-900 lg:mx-0 lg:max-w-none">
                    {{ __('Aktivitas Terkini') }}
                </h2>
            </div>

            <div class="my-6 overflow-hidden border-t border-gray-100/90">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-sm leading-6 text-gray-900">
                                <th scope="colgroup" colspan="3" class="relative isolate py-2 font-semibold">
                                    {{ __('Tabel') }}

                                    <div
                                        class="absolute inset-y-0 right-full -z-10 w-screen border-b border-gray-200 bg-gray-50">
                                    </div>

                                    <div
                                        class="absolute inset-y-0 left-0 -z-10 w-screen border-b border-gray-200 bg-gray-50">
                                    </div>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($results as $result)
                                <tr class="relative grid grid-cols-2 sm:grid-cols-3 py-5 gap-x-6">
                                    <td>
                                        <div class="flex sm:space-x-6">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor"
                                                class="hidden h-6 w-5 flex-none text-gray-400 sm:block">
                                                <path fill-rule="evenodd"
                                                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                            <div>
                                                <div class="flex items-start gap-x-3">
                                                    <div class="text-sm font-medium leading-6 text-gray-900 truncate">
                                                        {{ $result->student->name }}
                                                    </div>

                                                    {{-- @if ($payroll->status)
                                                        <div
                                                            class="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset text-green-700 bg-green-50 ring-green-600/20">
                                                            {{ __('Success') }}
                                                        </div>
                                                    @else
                                                        <div
                                                            class="rounded-md py-1 px-2 text-xs font-medium ring-1 ring-inset text-yellow-700 bg-yellow-50 ring-yellow-600/20">
                                                            {{ __('Pending') }}
                                                        </div>
                                                    @endif --}}
                                                </div>

                                                <div class="mt-1 text-xs leading-5 text-gray-500">
                                                    {{ $result->student->classroom->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="hidden sm:table-cell">
                                        <div class="text-sm leading-6 text-gray-900">
                                            {{ __('Tipe Gaya Belajar') }}
                                        </div>

                                        <div class="mt-1 text-xs leading-5 text-gray-500 truncate">
                                            {{ __('Visual :visual%, Auditori :auditory%, Kinestetik :kinesthetic%', [
                                                'visual' => Number::format(($result->visual * 100) / 30, 2),
                                                'auditory' => Number::format(($result->auditory * 100) / 30, 2),
                                                'kinesthetic' => Number::format(($result->kinesthetic * 100) / 30, 2),
                                            ]) }}
                                        </div>
                                    </td>

                                    <td class="text-right">
                                        <div class="flex justify-end">
                                            <x-anchor :href="route('results.show', $result->student->classroom->uuid)"
                                                class="text-sm font-medium leading-6 text-primary-500 hover:text-secondary-500">
                                                {{ __('Lihat Detail') }}
                                            </x-anchor>
                                        </div>

                                        <div class="mt-1 text-xs leading-5 text-gray-500 truncate">
                                            {{ __(':created_at WIB', [
                                                'created_at' => \Carbon\Carbon::parse($result->created_at)->isoFormat('dddd, DD MMMM YYYY HH:mm'),
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
        </div>
    </div>
</main>
