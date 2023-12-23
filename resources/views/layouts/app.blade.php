<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full" x-data="tallstackui_darkTheme()"
    x-bind:class="{ 'dark bg-gray-900': darkTheme, 'bg-white': !darkTheme }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Primary -->
    <meta name="title" content="{{ config('app.title') }}" />
    <meta name="description" content="{{ config('app.description') }}" />

    <!-- Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ config('app.url') }}" />
    <meta property="og:title" content="{{ config('app.title') }}" />
    <meta property="og:description" content="{{ config('app.description') }}" />
    <meta property="og:image" content="{{ asset('images/logo.png') }}" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{ config('app.url') }}" />
    <meta property="twitter:title" content="{{ config('app.title') }}" />
    <meta property="twitter:description" content="{{ config('app.description') }}" />
    <meta property="twitter:image" content="{{ asset('images/logo.png') }}" />

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/airbnb.css">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">

    @livewireStyles

    @tallStackUiScript

    @tallStackUiStyle

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>
        {{ __(':title :app_name - :app_title', [
            'title' => $title ? $title . ' -' : null,
            'app_name' => config('app.name'),
            'app_title' => config('app.title'),
        ]) }}
    </title>
</head>

<body class="h-full font-sans antialiased" x-data="{ isSearchPaletteOpen: false }" x-cloak>
    @auth
        <x-navigation />
    @endauth

    {{ $slot }}

    <x-toast />

    @livewire('search-palette')

    @livewire('offline-state')

    @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
        FilePond.registerPlugin(
            FilePondPluginFileValidateType,
            FilePondPluginFileValidateSize
        );
    </script>
</body>

</html>
