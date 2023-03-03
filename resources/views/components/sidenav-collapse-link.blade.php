@props(['title', 'icon' => ''])

<li class="relative" id="sidenav{{$title}}">
    <a class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out cursor-pointer"
        data-te-collapse-init
        data-te-ripple-init
        data-te-ripple-color="light"
        href="#collapse-sidenav-{{$title}}"
        role="button"
        aria-expanded="false"
        aria-controls="collapse-sidenav-{{$title}}"
    >
        
        <i class="{{ $icon }}"></i>
        <span class="ml-4 capitalize">{{ $title }}</span>

        <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-3 h-3 ml-auto" role="img"
            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path fill="currentColor"
                d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z">
            </path>
        </svg>
    </a>

    <ul class="!visible hidden" id="collapse-sidenav-{{$title}}" data-te-collapse-item>

        {{ $slot }}

    </ul>
</li>