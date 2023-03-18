<x-app-layout>

    <div class="w-full">
        <img class="mx-auto" src="{{ asset('storage/img/evaz_essentials_banner.jpg') }}" width="300">
    </div>


    <div class="px-4">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-4 px-10 pb-4">
            <div class="col-span-full text-center text-3xl font-bold text-slate-700 mb-4">
                Products
            </div>
            @foreach ($products as $product)
                <div class="flex justify-center">
                    <div class="block max-w-sm rounded-lg bg-white text-center shadow-lg ">
                        <div
                            class="border-b-2 border-neutral-100 py-3 px-6 ">
                            {{ $product->category?->name ?? 'No Category' }}
                        </div>
                        <div class="p-6">
                            <a href="#!">
                                <div class="w-[250px] h-[300px] bg-cover bg-no-repeat bg-center hover:opacity-80"
                                    style="background-image: url({{ asset('storage/' . $product->previewImages->path) }})">

                                </div>
                            </a>

                            <h5 class="mb-2 mt-1 text-xl font-medium leading-tight text-neutral-800 capitalize">
                                {{ $product->name }}
                            </h5>
                            <p class="mb-2 text-base text-neutral-600">
                                ₱ {{ number_format($product->price) }}
                            </p>
                        </div>
                        <div
                            class="border-t-2 border-neutral-100 py-3 px-6">
                            <livewire:add-to-cart :product="$product" />
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
