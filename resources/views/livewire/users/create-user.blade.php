<main>
    <form class="py-6" wire:submit="save">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-base font-semibold leading-7 text-gray-900">
                {{ $title }}
            </h2>

            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-600">
                {{ __('Informasi ini akan ditampilkan secara publik jadi berhati-hatilah dengan apa yang Anda bagikan.') }}
            </p>
        </div>

        <div class="mt-6 border-t border-gray-200 pt-6">
            <div class="grid grid-cols-1 gap-y-6 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div>
                    <x-input :label="__('Nama Lengkap')" wire:model="name" :placeholder="__('Masukkan nama lengkap pengguna')" autocomplete="off" required />
                </div>

                <div>
                    <x-input type="email" :label="__('Email')" wire:model="email" :placeholder="__('Masukkan email pengguna')" required />
                </div>

                <div>
                    <x-select.styled :label="__('Peran')" wire:model="role" :request="[
                        'url' => route('api.roles'),
                        'method' => 'post',
                    ]" :placeholders="[
                        'default' => 'Pilih salah satu',
                        'search' => 'Ketikkan sesuatu untuk mencari',
                        'empty' => 'Tidak ditemukan data apapun',
                    ]"
                        select="label:name|value:name" />
                </div>
            </div>
        </div>

        <div class="mt-6 border-t border-gray-200 pt-6">
            <div class="grid grid-cols-1 gap-y-6 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex justify-end gap-x-2">
                    <x-button :href="url()->previous()" :text="__('Batal')" class="text-sm font-medium" color="secondary"
                        outline />

                    <x-button type="submit" :text="__('Simpan')" class="text-sm font-medium hover:bg-opacity-80" primary
                        loading />
                </div>
            </div>
        </div>
    </form>
</main>
