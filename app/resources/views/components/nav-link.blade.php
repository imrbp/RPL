@props(['active'])

@php
$classes = ($active ?? false)
? 'card-title fw-bold text-dark bg-white'
: 'text-white hover:text-dark';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>