@props(['active', 'icon'])

@php
$classes = ($active ?? false)
? 'flex items-center p-2 text-gray-900 bg-gray-200 rounded-lg dark:text-white dark:bg-gray-700 group'
: 'flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    @if(isset($icon))
    {{ $icon }}
    @endif
    <span class="ms-3">{{ $slot }}</span>
</a>