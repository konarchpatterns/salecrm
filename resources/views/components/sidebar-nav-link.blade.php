@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'flex items-center p-2 rounded-md hover:bg-gray-100 bg-blue-100 text-blue-600 group'
            : 'flex items-center p-2 text-gray-900 rounded-md hover:bg-gray-100 group';
@endphp
<li>
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
</li>
