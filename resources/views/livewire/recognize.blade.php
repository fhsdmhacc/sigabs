<main class="relative lg:h-full">
    <div class="h-80 overflow-hidden lg:absolute lg:h-full lg:w-1/2 lg:pr-4 xl:pr-12">
        <img src="{{ asset('images/avery-evans-7rRH23jkIwo-unsplash.jpg') }}" alt="image"
            class="h-full w-full object-cover object-center">
    </div>

    <div
        class="mx-auto max-w-2xl px-4 py-16 sm:px-6 2xl:py-24 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8 xl:gap-x-24 lg:items-center lg:h-full">
        <div class="lg:col-start-2">
            <h1 class="text-sm font-medium text-primary">
                {{ __('Langkah ke 2 dari 3') }}
            </h1>

            <p class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">
                {{ $title }}
            </p>

            <p class="mt-2 text-base text-gray-500">
                {{ __('Luangkan waktu sejenak dan rilekskan dirimu untuk menyelesaikan tes ini dengan nyaman. Pilih salah satu opsi dibawah ini dengan jujur.') }}
            </p>

            <dl class="mt-16 text-sm font-medium">
                <dd class="mt-2 text-primary">
                    {{ __('Pertanyaan ke :step dari :count', [
                        'step' => $step,
                        'count' => $questions->count(),
                    ]) }}
                </dd>
            </dl>

            <div class="mt-2">
                @foreach ($questions as $question)
                    <fieldset wire:key="{{ $step }}" x-show="$wire.step == {{ $question->id }}"
                        class="w-full z-0">
                        <legend class="mt-4 text-base font-semibold leading-6 text-gray-900">
                            {{ __(':step. :question :', [
                                'step' => $step,
                                'question' => $question->name,
                            ]) }}
                        </legend>

                        <div class="mt-6 space-y-6">
                            @foreach ($question->options as $option)
                                <label
                                    x-bind:class="$wire.test_{{ $step }} == '{{ $option->value }}' ? 'border-primary' :
                                        'border-gray-300'"
                                    class="relative flex cursor-pointer rounded-lg border p-4 shadow-sm">
                                    <input type="radio" wire:model="test_{{ $step }}"
                                        value="{{ $option->value }}" class="sr-only">

                                    <span class="flex flex-1">
                                        <span class="flex items-center text-sm text-gray-500">
                                            {{ __(':label.', [
                                                'label' => $option->label,
                                            ]) }}
                                        </span>
                                    </span>

                                    <x-icon name="check-circle" class="h-5 w-5"
                                        x-bind:class="$wire.test_{{ $step }} == '{{ $option->value }}' ? 'text-primary' :
                                            'text-transparent'" />

                                    <span
                                        x-bind:class="$wire.test_{{ $step }} == '{{ $option->value }}' ?
                                            'border-primary' :
                                            'border-gray-300'"
                                        class="pointer-events-none absolute -inset-px rounded-lg border-2"
                                        aria-hidden="true"></span>
                                </label>
                            @endforeach

                            @error('test_' . $step)
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </fieldset>
                @endforeach
            </div>

            <div class="mt-16 border-t border-gray-200 py-6 flex items-center justify-between">
                @if ($step != 1)
                    <button type="button" wire:click="prev"
                        class="text-sm font-medium text-primary hover:text-opacity-80" loading>
                        <span aria-hidden="true"> &larr;</span>
                        {{ __('Sebelumnya') }}
                    </button>
                @endif

                <button type="button" wire:click="next"
                    class="text-sm font-medium text-primary hover:text-opacity-80 ml-auto" loading="next">
                    {{ $step == 30 ? __('Lihat Hasil') : __('Selanjutnya') }}
                    <span aria-hidden="true"> &rarr;</span>
                </button>
            </div>
        </div>
    </div>
</main>
