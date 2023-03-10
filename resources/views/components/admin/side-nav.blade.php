<div class="w-60 h-full shadow-md bg-white fixed top-16 border-t">
    <ul class="relative">
        <x-sidenav-link title="DASHBOARD" icon="fa-solid fa-chart-column" :route="route('dashboard')">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-graph-up-arrow" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z"/>
                </svg>
            </x-slot:icon>

        </x-sidenav-link>

        <x-sidenav-link title="PRODUCTS" icon="" :route="route('admin.products')">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag-heart" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5Zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0ZM14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1ZM8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                </svg>
            </x-slot:icon>
        </x-sidenav-link>

        <x-sidenav-link title="CATEGORIES" icon="" :route="route('admin.categories')">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-tags" viewBox="0 0 16 16">
                    <path d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z"/>
                    <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
                </svg>
            </x-slot:icon>
        </x-sidenav-link>

        {{-- <x-sidenav-collapse-link title="orders" icon="fa-solid fa-boxes-stacked">
            <x-sidenav-link title="Orders" route="#" class="ml-6"/>
            <x-sidenav-link title="All Products" :route="route('admin.products.index')" class="ml-6"/>
            <x-sidenav-link title="Categories" :route="route('admin.category.index')" class="ml-6"/>
            <x-sidenav-link title="Reviews" :route="route('admin.review.index')" class="ml-6"/>
        </x-sidenav-collapse-link> --}}

    </ul>
</div>
