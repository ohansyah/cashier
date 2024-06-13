{{-- <div class="container mx-4 p-4"> --}}
    <div class="w-full mx-auto p-4">
        <div class="flex space-x-4">
            <div class="w-2/3">

                <div class="flex items-center space-x-4 py-4 overflow-x-auto no-scrollbar">
                    <div class="flex-grow lg:flex-grow-0 lg:w-1/3">
                        <div class="relative">
                            <input wire:model.live='searchQuery' type="search" id="search" placeholder="Search..."
                                class="border-gray-300 rounded-md shadow-sm text-gray-800 pl-10 w-full">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                @svg('heroicon-s-magnifying-glass', 'w-5 h-5')
                            </div>
                        </div>
                    </div>
                
                    <div class="flex space-x-4 overflow-x-auto no-scrollbar">
                        @foreach ($categories as $category)
                            <div class="flex-shrink-0 flex items-center bg-gray-200 rounded-lg p-2 hover:bg-indigo-300 transition duration-200 ease-in-out">
                                <img src="{{ $category['image_url'] }}" alt="{{ $category['name'] }}" class="w-8 h-8 object-cover rounded-full mr-2">
                                <span>{{ $category['name'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div>
                    <div class="grid grid-cols-5 gap-2">
                        @foreach ($products as $product)
                        <div class="border p-4 rounded-lg bg-white">
                            <img src="{{ $product->image_url }}" alt="{{ $product['name'] }}"
                                class="w-full h-32 object-cover">
                            <div class="mt-2">
                                <h3 class="font-semibold">{{ $product['name'] }}</h3>
                                <p class="text-indigo-500">{{ $product->price_formatted }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>

                </div>


            </div>
            <div class="w-1/3">
                <div class="border p-4 rounded-lg">
                    <h3 class="font-semibold">Cart</h3>
                    <ul>
                        @foreach ($cartItems as $item)
                        <li class="flex justify-between mt-2">
                            <span>{{ $item['name'] }}</span>
                            <span>${{ number_format($item['price'], 2) }}</span>
                        </li>
                        @endforeach
                    </ul>
                    <div class="mt-4">
                        <div class="flex justify-between mt-2">
                            <span>Total</span>
                            <span>${{ number_format(collect($cartItems)->sum('price'), 2) }}</span>
                        </div>
                    </div>
                    <button class="bg-indigo-500 text-white w-full mt-4 py-2 rounded">Checkout</button>
                </div>
            </div>
        </div>
    </div>