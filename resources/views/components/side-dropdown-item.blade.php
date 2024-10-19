@props(['href', 'active' => false])

<li>
    <a href="{{ $href }}"
        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ $active ? 'bg-gray-200 dark:bg-gray-600' : '' }}">
        {{ $slot }}
    </a>
</li>