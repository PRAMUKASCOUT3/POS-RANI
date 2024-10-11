@props(['active' => false])

@php
    $classes = ($active ?? false) ? 'sidebar-link active' : 'sidebar-link';
@endphp

<li class="sidebar-item">
    <a {{ $attributes->merge(['class' => $classes]) }}>
        <span>{{ $slot }}</span>
    </a>
</li>
