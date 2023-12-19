@props([
    'href' => $href,
    'navigate' => true,
])

<a {{ $attributes->merge([
    'href' => $href,
]) }} @if ($navigate) wire:navigate @endif>
    {{ $slot }}
</a>
