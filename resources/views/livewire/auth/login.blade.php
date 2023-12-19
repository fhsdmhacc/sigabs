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
                        {{ __('Langkah ini diperlukan sebelum akses akun Anda') }}
                    </p>
                </div>

                <form class="mt-10 space-y-6" wire:submit="save">
                    <div>
                        <x-input type="email" :label="__('Email')" wire:model="email" :placeholder="__('Masukkan email Anda')" autocomplete="on"
                            required />
                    </div>

                    <div>
                        <x-password :label="__('Kata Sandi')" wire:model="password" :placeholder="__('Masukkan kata sandi Anda')" required />
                    </div>

                    <div class="flex items-center justify-between">
                        <div>
                            <x-checkbox sm id="remember_me" color="primary" :label="__('Ingat saya')"
                                wire:model="remember_me" />
                        </div>

                        @if (Route::has('password.request'))
                            <x-anchor :href="route('password.request')" class="text-sm text-primary hover:opacity-80">
                                {{ __('Lupa kata sandi?') }}
                            </x-anchor>
                        @endif
                    </div>

                    <x-button type="submit" :text="__('Masuk')" class="w-full hover:opacity-80 sm:text-sm" primary
                        loading />

                    <p class="text-sm text-center text-gray-500">
                        {{ __('Belum punya akun?') }}

                        <a href="#" class="text-primary hover:opacity-80" target="_blank">
                            {{ __('Coba demo aplikasi gratis') }}
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </x-pattern>
</div>
