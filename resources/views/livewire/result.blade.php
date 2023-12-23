<main class="relative lg:h-full" x-data="{ isSlideOverShow: false }">
    <div class="h-80 overflow-hidden lg:absolute lg:h-full lg:w-1/2 lg:pr-4 xl:pr-12">
        <img src="{{ asset('images/avery-evans-7rRH23jkIwo-unsplash.jpg') }}" alt="image"
            class="h-full w-full object-cover object-center">
    </div>

    <div
        class="mx-auto max-w-2xl px-4 py-16 sm:px-6 2xl:py-24 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8 xl:gap-x-24 lg:items-center lg:h-full">
        <div class="lg:col-start-2">
            <h1 class="text-sm font-medium text-primary">
                {{ __('Langkah ke 3 dari 3') }}
            </h1>

            <p class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">
                {{ $title }}
            </p>

            <p class="mt-2 text-base text-gray-500">
                {{ __('Informasi dibawah ini bukan hanya sekedar hasil, tapi kunci pembuka menuju potensi luar biasa dalam pembelajaranmu.') }}
            </p>

            <dl class="mt-16 text-sm font-medium">
                <dt class="text-gray-900">
                    {{ $student->name }}
                </dt>

                <dd class="mt-2 text-primary flex items-center justify-between">
                    <p>
                        {{ $student->identification_number }}
                    </p>

                    <p class="text-gray-900">
                        {{ $student->class }}
                    </p>
                </dd>
            </dl>

            <dl class="space-y-6 border-t border-gray-200 mt-6 pt-6 text-sm font-medium text-gray-500">
                @foreach ($student->results as $result)
                    <div wire:key="{{ $result->id }}" class="flex justify-between">
                        <dt>
                            {{ $result->type->label }}
                        </dt>

                        <dd class="text-gray-900">
                            {{ __(':values_count%', [
                                'values_count' => number_format(($result->total * 100) / 30, 2),
                            ]) }}
                        </dd>
                    </div>
                @endforeach

                <div class="flex items-center justify-between border-t border-gray-200 pt-6 text-gray-900">
                    <dt class="text-sm">
                        {{ __('Tipe Gaya Belajar') }}
                    </dt>

                    <dd class="text-sm">
                        @foreach ($results->sortByDesc('total') as $result)
                            {{ $result->type->label }}
                        @endforeach
                    </dd>
                </div>
            </dl>

            <dl class="mt-6">
                <div class="rounded-md bg-indigo-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-indigo-400" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>

                        <div class="ml-3 flex-1 md:flex md:justify-between">
                            <p class="text-sm text-indigo-700">
                                {{ __('Yuk! lihat interpretasi gaya belajar dan saran untuk memaksimalkan pembelajaranmu') }}
                            </p>

                            <p class="mt-3 text-sm md:ml-6 md:mt-0">
                                <button type="button" x-on:click="isSlideOverShow = !isSlideOverShow"
                                    class="whitespace-nowrap font-medium text-indigo-700 hover:text-indigo-600">
                                    {{ __('Lihat detail') }}
                                    <span aria-hidden="true"> &rarr;</span>
                                </button>
                            </p>
                        </div>
                    </div>
                </div>
            </dl>

            <div class="mt-6 border-t border-gray-200 py-6 text-right">
                <x-anchor :href="route('index')" class="text-sm font-medium text-primary hover:text-opacity-80">
                    {{ __('Kembali ke halaman utama') }}
                    <span aria-hidden="true"> &rarr;</span>
                </x-anchor>
            </div>
        </div>
    </div>

    <div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
        <div x-show="isSlideOverShow" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div x-show="isSlideOverShow" class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10 sm:pl-16">
                    <div x-show="isSlideOverShow"
                        x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                        x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                        x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                        x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                        class="pointer-events-auto w-screen max-w-md" @click.away="isSlideOverShow = false">
                        <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                            <div class="p-6">
                                <div class="flex items-start justify-between">
                                    <h2 class="text-base font-semibold leading-6 text-gray-900" id="slide-over-title">
                                        {{ __('Interpretasi dan Saran') }}
                                    </h2>

                                    <div class="ml-3 flex h-7 items-center">
                                        <button type="button" x-on:click="isSlideOverShow = !isSlideOverShow"
                                            class="relative rounded-md bg-white text-gray-400 hover:text-gray-500 focus:ring-2 focus:ring-indigo-500">
                                            <span class="absolute -inset-2.5"></span>

                                            <span class="sr-only">
                                                {{ __('Tutup panel') }}
                                            </span>

                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="border-b border-gray-200">
                                <div class="px-6">
                                    <!-- Tab component -->
                                    <nav class="-mb-px flex space-x-6">
                                        <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                                        <a href="#"
                                            class="border-indigo-500 text-indigo-600 whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium">
                                            {{ __('Visual') }}
                                        </a>

                                        <a href="#"
                                            class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium">
                                            {{ __('Auditori') }}
                                        </a>

                                        <a href="#"
                                            class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium">
                                            {{ __('Kinestetik') }}
                                        </a>
                                    </nav>
                                </div>
                            </div>

                            <ul role="list" class="flex-1 divide-y divide-gray-200 overflow-y-auto">
                                <li>
                                    <div class="group relative flex items-center px-5 py-6">
                                        //
                                    </div>
                                </li>

                                <!-- More people... -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
