@props(['href', 'active' => false])

@php
    $classes = 'nav-link py-1 px-2 rounded';

    if ($active) {
        $classes .= ' active fw-semibold';
    } else {
        $classes .= ' text-white-50';  // un gris clair
    }
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }} aria-current="{{ $active ? 'page' : '' }}">
    {{ $slot }}
</a>
