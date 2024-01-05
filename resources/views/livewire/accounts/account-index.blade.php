<main class="py-6" x-data="{ isLogoutModalOpen: false }">
    <div class="mx-auto max-w-2xl space-y-16 sm:space-y-20 lg:mx-0 lg:max-w-none">
        <div>
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h2 class="text-base font-semibold leading-7 text-gray-900">
                    {{ __('Akun') }}
                </h2>

                <p class="mt-1 text-sm leading-6 text-gray-500">
                    {{ __('Informasi ini akan ditampilkan secara publik jadi berhati-hatilah dengan apa yang Anda bagikan.') }}
                </p>
            </div>

            <div class="mt-6 border-t border-gray-200 text-sm leading-6">
                <dl class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="pt-6 sm:flex">
                        <dt class="font-medium text-gray-900 sm:w-64 sm:flex-none sm:pr-6">
                            {{ __('Nama Lengkap') }}
                        </dt>

                        <dd class="mt-1 flex justify-between gap-x-6 sm:mt-0 sm:flex-auto">
                            <div class="text-gray-900">
                                {{ auth()->user()->name }}
                            </div>
                        </dd>
                    </div>
                </dl>
            </div>

            <div class="mt-6 border-t border-gray-200 text-sm leading-6">
                <dl class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="pt-6 sm:flex">
                        <dt class="font-medium text-gray-900 sm:w-64 sm:flex-none sm:pr-6">
                            {{ __('Email') }}
                        </dt>

                        <dd class="mt-1 flex justify-between gap-x-6 sm:mt-0 sm:flex-auto">
                            <div class="text-gray-900">
                                {{ auth()->user()->email }}
                            </div>
                        </dd>
                    </div>
                </dl>
            </div>

            <div class="mt-6 border-t border-gray-200 text-sm leading-6">
                <dl class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="pt-6 sm:flex">
                        <dt class="font-medium text-gray-900 sm:w-64 sm:flex-none sm:pr-6">
                            {{ __('Kata Sandi') }}
                        </dt>

                        <dd class="mt-1 flex justify-between gap-x-6 sm:mt-0 sm:flex-auto">
                            <div class="text-gray-900">
                                {{ __('********') }}
                            </div>
                            <x-anchor href="#" class="font-semibold text-primary hover:text-opacity-80">
                                {{ __('Ubah') }}
                            </x-anchor>
                        </dd>
                    </div>
                </dl>
            </div>

            <div class="mt-6 border-t border-gray-200 text-sm leading-6">
                <dl class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="pt-6 sm:flex">
                        <dt class="font-medium text-gray-900 sm:w-64 sm:flex-none sm:pr-6">
                            {{ __('Peran') }}
                        </dt>

                        <dd class="mt-1 flex justify-between gap-x-6 sm:mt-0 sm:flex-auto">
                            <div class="text-gray-900">
                                {{ auth()->user()->getRoleNames()[0] }}
                            </div>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        <div>
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h2 class="text-base font-semibold leading-7 text-gray-900">
                    {{ __('Sesi Browser') }}
                </h2>

                <p class="mt-1 text-sm leading-6 text-gray-500">
                    {{ __('Kelola dan keluar dari sesi aktif Anda di browser dan perangkat lain.') }}
                </p>
            </div>

            @foreach ($sessions as $session)
                <div class="mt-6 border-t border-gray-200 text-sm leading-6">
                    <dl class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <div class="pt-6 sm:flex">
                            <dt class="font-medium text-gray-900 sm:w-64 sm:flex-none sm:pr-6">
                                {{ __(':platform - :browser', [
                                    'platform' => $session->device['platform'] ?? 'Unknown',
                                    'browser' => $session->device['browser'] ?? 'Unknown',
                                ]) }}
                            </dt>

                            <dd class="mt-1 flex justify-between gap-x-6 sm:mt-0 sm:flex-auto">
                                <div class="text-gray-900 flex items-center">
                                    @if ($session->is_current_device)
                                        {{ __(':ip_address -', [
                                            'ip_address' => $session->ip_address,
                                        ]) }}
                                        <span
                                            class="ml-2 inline-flex items-center gap-x-1.5 rounded-md bg-green-100 px-1.5 py-0.5 text-xs font-medium text-green-700">
                                            <svg class="h-1.5 w-1.5 fill-green-500" viewBox="0 0 6 6"
                                                aria-hidden="true">
                                                <circle cx="3" cy="3" r="3" />
                                            </svg>
                                            {{ __('Perangkat ini') }}
                                        </span>
                                    @else
                                        {{ __(':ip_address - Terakhir aktif :last_active', [
                                            'ip_address' => $session->ip_address,
                                            'last_active' => $session->last_active,
                                        ]) }}
                                    @endif
                                </div>

                                @if ($session->is_current_device)
                                    <button type="button" wire:click="logout"
                                        class="flex items-center font-semibold text-red-600 hover:text-red-500">
                                        {{ __('Keluar') }}
                                    </button>
                                @endif
                            </dd>
                        </div>
                    </dl>
                </div>
            @endforeach

            <div class="mt-6 border-t border-gray-200 text-sm leading-6">
                <dl class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="pt-6">
                        <button type="button" x-on:click="isLogoutModalOpen = !isLogoutModalOpen"
                            class="font-semibold text-primary hover:text-opacity-80">
                            {{ __('Keluar dari sesi browser lainnya') }}
                        </button>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div x-show="isLogoutModalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-out duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-init="() => {
                $wire.on('logout-success', () => {
                    isLogoutModalOpen = false;
                });
            }"
            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div x-show="isLogoutModalOpen" class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <form wire:submit="logoutOtherBrowserSessions" x-show="isLogoutModalOpen"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-out duration-200 translate-y-0 sm:scale-100"
                    x-transition:leave-start="opacity-100 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:leave-end="opacity-0"
                    class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                            </svg>
                        </div>

                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">
                                {{ __('Keluar dari sesi browser lainnya') }}
                            </h3>

                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    {{ __('Apakah Anda yakin ingin keluar dari seluruh sesi browser lainnya? Ini menyebabkan seluruh sesi browser selain perangkat ini akan dihapus secara permanen.') }}
                                </p>
                            </div>

                            <div class="mt-2">
                                <x-password wire:model="password" :placeholder="__('Masukkan kata sandi Anda saat ini')" required />
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                        <button type="submit"
                            class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                            {{ __('Keluar') }}
                        </button>

                        <button type="button" x-on:click="isLogoutModalOpen = !isLogoutModalOpen"
                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                            {{ __('Batal') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
