@props(['href', 'active' => false])

@php
    $classes = 'block px-4 py-2 rounded hover:bg-violet-light hover:text-violet-darker';

    if ($active) {
        $classes .= ' bg-violet-light text-violet-gray-dark font-semibold';
    } else {
        $classes .= ' text-violet-matte';
    }
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
