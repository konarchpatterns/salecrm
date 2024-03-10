@props(['active', 'title'])

@php
$classes = ($active ?? false)
            ? 'flex items-center p-2 rounded-lg bg-blue-100 group text-blue-600 font-bold'
            : 'flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group';
@endphp
<li>
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
        <span class="flex-1 ms-3 whitespace-nowrap">{{ $title }}</span>
    </a>
</li>
