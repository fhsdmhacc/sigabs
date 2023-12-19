<div {{ $attributes->class(['mb-6 overflow-hidden border-t border-gray-100/90']) }}>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <table class="w-full text-left">
            <thead>
                <tr class="text-sm leading-6 text-gray-900">
                    <th scope="colgroup" colspan="3" class="relative isolate py-2 font-semibold">
                        {{ __('Tabel') }}

                        <div class="absolute inset-y-0 right-full -z-10 w-screen border-b border-gray-200 bg-gray-50">
                        </div>

                        <div class="absolute inset-y-0 left-0 -z-10 w-screen border-b border-gray-200 bg-gray-50"></div>
                    </th>
                </tr>
            </thead>

            <tbody>
                {{ $slot }}
            </tbody>
        </table>
    </div>
</div>
