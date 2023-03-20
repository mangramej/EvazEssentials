<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-4">
                        <x-carousel :images="$product->images" />

                        <div class="sm:ml-16 px-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2">
                                <div>
                                    <label for="product-name" class="text-slate-600 text-sm">Product Name</label>
                                    <h1 class="text-3xl font-bold capitalize text-slate-800" id="product-name">
                                        {{ $product->name }}</h1>
                                    <label for="product-name" class="text-slate-600 text-sm">Price</label>
                                    <p class="text-2xl">₱ {{ number_format($product->price) }}</p>
                                </div>

                                <div class="sm:text-right">
                                    <livewire:add-to-cart :product="$product" />
                                </div>
                            </div>

                            <div class="mt-4">
                                <label for="product-description" class="text-slate-600 text-sm">Description</label>
                                <div id="product-description">
                                    <span class="w-full text-slate-800">
                                        {{ empty($product->description) ? 'No description' : $product->description }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
