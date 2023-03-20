<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div>
                <h2 class="font-medium text-3xl text-slate-800">My Orders</h2>
                <div class="mt-3 font-normal text-slate-700">
                    Check the status of recent and old orders.
                </div>

                @foreach ($orders as $order)
                    <div class="grid grid-cols-1 sm:grid-cols-3 bg-white shadow-sm border border-gray-300 mt-6">
                        <div class="py-6 px-12 border-r border-gray-300 bg-gray-100">
                            <div>
                                <span class="text-slate-600">Order ID</span>
                                <p class="font-bold"># {{ $order->id }}</p>
                            </div>

                            <div class="mt-4">
                                <span class="text-slate-600">Date</span>
                                <p class="font-bold">{{ $order->created_at->format('F j, Y') }}</p>
                            </div>

                            <div class="mt-4">
                                <span class="text-slate-600">Total Amount</span>
                                <p class="font-bold capitalize">₱ {{ number_format($order->total) }}</p>
                            </div>

                            <div class="mt-4">
                                <span class="text-slate-600">Payment Type</span>
                                <p class="font-bold">{{ $order->payment_type == 'cod' ? 'Cash on delivery (COD)' : $order->payment_type }}</p>
                            </div>

                            <div class="mt-4">
                                <span class="text-slate-600">Status</span>
                                <p class="font-bold capitalize">{{ $order->status }}</p>
                            </div>
                        </div>

                        <div class="px-12 py-6 sm:col-span-2">
                            <div class="w-full border-b pb-4">
                                <span class="text-slate-600 font-bold">Order Items</span>
                            </div>
                            @foreach (unserialize($order->detail) as $item)
                                <div class="my-2 py-4 border-b w-full flex">
                                    <img src="{{ asset('storage/'. $item['image']) }}" class="mr-8" height="40" width="80">
                                    <span>
                                        <p class="capitalize font-bold">{{ $item['name'] }}</p>
                                        <p class="text-slate-600 font-bold mt-2">₱ {{ number_format($item['price']) }}</p>
                                        <p class="text-slate-600 font-bold mt-8">x {{ $item['quantity'] }}</p>
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>


</x-app-layout>
