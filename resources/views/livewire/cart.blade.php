<div>
    @if (!empty($cart))
        <div class="mb-4 w-full flex justify-between border-b pb-4 items-center">
            <div>
                <span class="text-slate-700 font-bold">{{ count($cart) }} Items </span>
            </div>

            <button class="flex justify-center text-slate-700 bg-gray-200 px-4 py-2 rounded hover:bg-gray-300"
                wire:click="clearCart">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-trash-fill" viewBox="0 0 16 16">
                    <path
                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                </svg> <span class="ml-2 text-sm font-bold">Clear <span>
            </button>
        </div>
    @endif

    <div>
        @foreach ($cart as $item)
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="bg-gray-200 w-full h-full flex justify-center">
                    <img src="{{ asset('storage/' . $item['image']) }}" width="100" height="100">
                </div>
                <div class="col-span-2">
                    <div class="flex justify-between items-center">
                        <h2 class="font-bold text-lg sm:text-sm">{{ $item['name'] }}</h2>
                        <button class="bg-red-500 px-2 py-1 rounded hover:bg-red-600"
                            wire:click="removeItem({{ $item['product-id'] }})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-cart-dash-fill text-white" viewBox="0 0 16 16">
                                <path
                                    d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM6.5 7h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1 0-1z" />
                            </svg>
                        </button>
                    </div>
                    <p class="text-slate-700">{{ $item['price'] }}</p>

                    <div class="relative mb-4 flex w-full flex-wrap items-stretch">
                        <span class="flex items-center whitespace-nowrap mr-4 text-slate-700">QTY: </span>
                        <button wire:click="addQuantity({{ $item['product-id'] }})"
                            class="flex items-center whitespace-nowrap rounded-l border border-r-0 border-solid border-neutral-300 px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-neutral-700">+</button>
                        <input type="text"
                            class="relative m-0 block w-[1px] min-w-0 flex-auto border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition ease-in-out focus:z-[3] focus:border-primary-600 focus:text-neutral-700 focus:shadow-te-primary focus:outline-none text-center"
                            value="{{ $item['quantity'] }}" min="0" readonly />
                        <button wire:click="deducQuantity({{ $item['product-id'] }})"
                            class="rounded-4 flex items-center whitespace-nowrap rounded-r border border-l-0 border-solid border-neutral-300 px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-neutral-700">-</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if (!empty($cart))
        <div class="w-full">
            <div>
                <span class="uppercase font-bold text-slate-700">Payment Type: </span>
                <x-input-error :messages="$errors->get('payment_type')" class="mt-2" />
            </div>

            <div class="uppercase mt-2">

                <input form="checkoutForm" type="radio" id="payment_type_cod" wire:model="payment_type" value="cod"
                    class="hidden peer">
                <label for="payment_type_cod"
                    class="inline-flex justify-between items-center py-2 px-4 w-full bg-white rounded border border-2 hover:border-slate-800 cursor-pointer peer-checked:border-slate-800 peer-checked:bg-slate-100  hover:bg-slate-100 text-slate-700">
                    <div class="block flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-truck" viewBox="0 0 16 16">
                            <path
                                d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                        <span class="ml-2 text-sm text-gray-800 font-bold">Cash
                            on delivery</span>
                    </div>

                </label>
            </div>
        </div>

        <div class="mb-4 w-full border-t pt-4 items-center mt-4">
            <div class="w-full flex justify-between ">
                <span class="text-slate-700 font-bold uppercase">Total Cost </span>
                <span class="text-slate-700 font-bold uppercase">₱ {{ number_format($total) }} </span>
            </div>

            <div class="mt-2">
                <button
                    class="bg-sky-500 px-4 py-2 hover:bg-sky-600 uppercase text-white w-full transistion ease

                "
                    wire:loading.attr="disabled" wire:click="checkout" >

                    <span wire:loading.remove wire:target="checkout" class="flex justify-center items-center font-bold">
                        Place Order
                    </span>

                    <div wire:loading wire:target="checkout" class="flex items-center justify-center">
                        <div class="inline-block h-4 w-4 animate-spin rounded-full border-4 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]"
                            role="status">
                            <span
                                class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
                        </div>
                </button>
            </div>
        </div>
    @endif
</div>
