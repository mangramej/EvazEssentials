 @unless ($breadcrumbs->isEmpty())
 <nav class="w-full rounded-md">
    <ol class="list-reset flex">
        @foreach ($breadcrumbs as $breadcrumb)
            @if (!is_null($breadcrumb->url) && !$loop->last)
                <li class="breadcrumb-item">
                    <a href="{{ $breadcrumb->url }}" class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600">
                        {{ $breadcrumb->title }}
                    </a>
                </li>
                <li>
                    <span class="mx-2 text-neutral-500 dark:text-neutral-400">/</span>
                </li>
            @else
                <li class="text-neutral-500 dark:text-neutral-400">{{ $breadcrumb->title }}</li>
            @endif
            
        @endforeach
    </ol>
 </nav>
@endunless
