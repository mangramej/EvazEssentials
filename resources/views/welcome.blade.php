<x-app-layout>

    <div class="container bg-[#ECE8E7]">
        <img class="mx-auto" src="{{ asset('storage/img/evaz_essentials_banner.jpg') }}" width="300">
    </div>

    <div class="grid grid-cols-4 gap-4 px-4 bg-[#ECE8E7]">
        @foreach ($products as $product)
            <div class="bg-white text-slate-700 h-96 shadow border p-4">
                {{ $product->name }}
                | {{ $product->price }}
                | <livewire:add-to-cart :product="$product" />
            </div>
        @endforeach
    </div>

</x-app-layout>
