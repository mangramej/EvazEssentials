@props(['route', 'title', 'icon' => '', 'class' => ''])

<a class="flex items-center text-sm border-b py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out {{ $class }}"
    href="{{ $route }}">
    {{ $icon }}
    <p class="ml-4 capitalize text-gray-700 text-lg">{{ $title }}</p>
</a>
