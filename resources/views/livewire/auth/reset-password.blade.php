<div class="h-full">
    <x-pattern class="h-full">
        <div class="h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full space-y-6">
                <div class="text-center">
                    <x-anchor :href="route('index')">
                        <x-application-logo class="mx-auto" width="80" />
                    </x-anchor>

                    <h2 class="text-center text-3xl font-bold text-gray-900 mt-6">
                        {{ $title }}
                    </h2>

                    <p class="mt-2 mb-6 text-center text-sm text-gray-500">
                        {{ __('Langkah ini diperlukan untuk kredensial baru akun Anda') }}
                    </p>
                </div>

                <form class="mt-10 space-y-6" wire:submit="save">
                    <div>
                        <input type="hidden" wire:model="token" />
                    </div>

                    <div>
                        <x-input type="email" :label="__('Email')" wire:model="email" readonly />
                    </div>

                    <div>
                        <x-password :label="__('Kata Sandi')" wire:model="password" :placeholder="__('Masukkan kata sandi Anda')" required />
                    </div>

                    <div>
                        <x-password :label="__('Konfirmasi Kata Sandi')" wire:model="password_confirmation" :placeholder="__('Masukkan konfirmasi kata sandi Anda')" required />
                    </div>

                    <x-button type="submit" :text="__('Masuk')" class="w-full hover:opacity-80 sm:text-sm" primary
                        loading />
                </form>
            </div>
        </div>
    </x-pattern>
</div>
