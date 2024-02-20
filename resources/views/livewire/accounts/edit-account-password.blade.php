<main>
    <form class="py-6" wire:submit="save">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-base font-semibold leading-7 text-gray-900">
                {{ $title }}
            </h2>

            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-600">
                {{ __('Informasi ini akan digunakan untuk akses akun Anda ketika masuk ke aplikasi.') }}
            </p>
        </div>

        <div class="mt-6 border-t border-gray-200 pt-6">
            <div class="grid grid-cols-1 gap-y-6 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div>
                    <x-password :label="__('Kata Sandi Saat Ini')" wire:model="current_password" :placeholder="__('Masukkan kata sandi Anda saat ini')" required />
                </div>

                <div>
                    <x-password :label="__('Kata Sandi Baru')" wire:model="password" :placeholder="__('Masukkan kata sandi baru Anda')" required />
                </div>

                <div>
                    <x-password :label="__('Konfirmasi Kata Sandi Baru')" wire:model="password_confirmation" :placeholder="__('Masukkan konfirmasi kata sandi baru Anda')" required />
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
