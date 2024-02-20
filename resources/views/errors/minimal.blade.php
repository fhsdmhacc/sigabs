<!DOCTYPE html>
<html lang="en" class="h-full" x-data="{ darkMode: localStorage.getItem('dark-theme') === 'true' }" x-init="$watch('darkMode', value => localStorage.setItem('dark-theme', value))" x-bind:class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>
        @yield('title')
    </title>
</head>

<body class="font-sans antialiased h-full bg-white">
    <main class="grid min-h-full place-items-center bg-white py-24 px-6 sm:py-32 lg:px-8">
        <div class="text-center">
            <p class="text-base font-semibold text-primary">
                @yield('code')
            </p>
            <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">
                @yield('message')
            </h1>
            <p class="mt-6 text-base leading-7 text-gray-600">
                {{ __('Sorry, we couldn’t find the page you’re looking for.') }}
            </p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="{{ app('router')->has('dashboard') ? route('dashboard') : url('/') }}"
                    class="rounded-md bg-primary px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                    {{ __('Go back home') }}
                </a>
                <a href="https://api.whatsapp.com/send?phone=6281&text=test" class="text-sm font-semibold text-gray-900"
                    target="_blank">
                    {{ __('Contact support') }}
                    <span aria-hidden="true">&rarr;</span>
                </a>
            </div>
        </div>
    </main>
</body>

</html>
