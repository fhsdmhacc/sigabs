@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<div>
    @if ($paginator->hasPages())
        <nav class="pb-8" aria-label="Pagination">
            <div class="flex items-center justify-between mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="hidden sm:block">
                    <p class="text-sm text-gray-700">
                        {!! __('Menampilkan') !!}
                        <span class="font-medium">
                            {{ $paginator->firstItem() }}
                        </span>
                        {!! __('sampai') !!}
                        <span class="font-medium">
                            {{ $paginator->lastItem() }}
                        </span>
                        {!! __('dari') !!}
                        <span class="font-medium">
                            {{ $paginator->total() }}
                        </span>
                        {!! __('hasil') !!}
                    </p>
                </div>
                <div class="flex flex-1 justify-between sm:justify-end">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}"
                            class="relative inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-500 ring-1 ring-inset ring-gray-300 cursor-default select-none"
                            aria-hidden="true">
                            {{ __('Sebelumnya') }}
                        </span>
                    @else
                        <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')"
                            dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before"
                            rel="prev"
                            class="relative inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                            aria-label="{{ __('pagination.previous') }}">
                            {{ __('Sebelumnya') }}
                        </button>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')"
                            dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after"
                            rel="next"
                            class="relative ml-3 inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                            aria-label="{{ __('pagination.next') }}">
                            {{ __('Selanjutnya') }}
                        </button>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}"
                            class="relative ml-3 inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-500 ring-1 ring-inset ring-gray-300 cursor-default select-none"
                            aria-hidden="true">
                            {{ __('Selanjutnya') }}
                        </span>
                    @endif
                </div>
            </div>
        </nav>
    @endif
</div>
