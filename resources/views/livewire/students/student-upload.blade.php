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
                    <x-filepond :label="__('Dokumen')" wire:model="document"
                        accepted="['application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', '.xlsx']"
                        max="1mb" />

                    <p class="mt-2 text-sm text-gray-500">
                        {{ __('Dokumen harus berekstensi .xls atau .xlsx. dan ukuran maksimal hanya 1 MB') }}
                    </p>
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
