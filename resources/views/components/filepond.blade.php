@props([
    'label' => $label,
])

<div>
    <label for="{{ $attributes->whereStartsWith('wire:model')->first() }}" class="font-medium text-sm text-gray-600">
        {{ $label }}
    </label>

    <div class="mt-1 relative" wire:ignore x-data x-init="() => {
        FilePond.create($refs.input);
        FilePond.setOptions({
            server: {
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    @this.upload('{{ $attributes->whereStartsWith('wire:model')->first() }}', file, load, error, progress)
                },
                revert: (filename, load) => {
                    @this.removeUpload('{{ $attributes->whereStartsWith('wire:model')->first() }}', filename, load)
                },
            },
            acceptedFileTypes: {!! $attributes->get('accepted') ?? 'null' !!},
            maxFileSize: {!! $attributes->has('max') ? "'" . $attributes->get('max') . "'" : 'null' !!}
        });
    }">
        <input type="file" x-ref="input">

        @error($attributes->whereStartsWith('wire:model')->first())
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        @enderror
    </div>
</div>
