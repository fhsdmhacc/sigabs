<main class="relative lg:h-full">
    <div class="h-80 overflow-hidden lg:absolute lg:h-full lg:w-1/2 lg:pr-4 xl:pr-12">
        <img src="{{ asset('images/avery-evans-7rRH23jkIwo-unsplash.jpg') }}" alt="image"
            class="h-full w-full object-cover object-center">
    </div>

    <div
        class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8 xl:gap-x-24 lg:items-center lg:h-full">
        <form class="lg:col-start-2" wire:submit="save">
            <h1 class="text-sm font-medium text-primary">
                {{ __('Langkah ke 1 dari 3') }}
            </h1>

            <p class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">
                {{ $title }}
            </p>

            <p class="mt-2 text-base text-gray-500">
                {{ __('Pada langkah pertama ini, kami perlu mengidentifikasi untuk mendapatkan informasi lebih lanjut tentang identitas Anda.') }}
            </p>

            <div class="mt-16 space-y-6">
                <div>
                    <x-input :label="__('Nomor Induk Siswa')" wire:model="identification_number" :placeholder="__('Masukkan NIS Anda')" inputmode="numeric"
                        required />
                </div>

                <div>
                    <x-flatpickr :label="__('Tanggal Lahir')" wire:model="birthday" :placeholder="__('Masukkan tanggal lahir Anda')" required />
                </div>

                <div>
                    <x-select.styled :label="__('Kelas')" wire:model="class" :options="$classes"
                        select="label:label|value:value" searchable />
                </div>
            </div>

            <div class="mt-16 border-t border-gray-200 py-6 text-right">
                <button type="submit" class="text-sm font-medium text-primary hover:text-opacity-80" loading>
                    {{ __('Lanjutkan') }}
                    <span aria-hidden="true"> &rarr;</span>
                </button>
            </div>
        </form>
    </div>
</main>
