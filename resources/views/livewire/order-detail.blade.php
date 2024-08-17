<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg gap-6 p-6">

            <div class="flex justify-between items-center pb-4 mb-4">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">{{ $order->invoice_number }}</h2>
                    <p class="text-sm text-gray-600">{{ $order->created_at}}</p>
                    <p class="text-sm text-gray-600">Cashier : {{ $order->user->name }}</p>
                </div>
                <div class="text-right">
                    <p class="text-gray-800 font-semibold">Company Name</p>
                    <p class="text-gray-600 text-sm">123 Street Address</p>
                    <p class="text-gray-600 text-sm">City, State, Zip</p>
                </div>
            </div>
            <div class="mb-4">
                <div class="mt-4 grid grid-cols-5 gap-3 text-center text-gray-800 font-semibold border-y py-2">
                    <div>Name</div>
                    <div>SKU</div>
                    <div>Qty</div>
                    <div>Price</div>
                    <div>Sub Total</div>
                </div>
                @foreach ($order->orderProducts as $item)
                <div class="grid grid-cols-5 gap-3 text-gray-600 mt-2">
                    <div class="text-left">{{ $item->product->name }}</div>
                    <div class="text-right">{{ $item->product->sku }}</div>
                    <div class="text-center">{{ $item->quantity }}</div>
                    <div class="text-right">{{ $item->total_formatted }}</div>
                    <div class="text-right">{{ $item->price_formatted }}</div>
                </div>
                @endforeach
            </div>
            <div class="flex justify-between items-center border-t pt-4">
                <div class="text-right font-semibold text-gray-800">
                    Total
                </div>
                <div class="text-right font-semibold text-gray-800">{{ $order->total_formatted }}</div>
            </div>

        </div>
    </div>
</div>
