<x-app-layout>
    <div>
        @foreach ($products as $product)
            {{ $product->name }}
            | {{ $product->price }}
            | <livewire:add-to-cart :product="$product" />
        @endforeach
    </div>

</x-app-layout>
