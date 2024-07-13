<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="w-full">

            {{-- Filters --}}
            <div class="sm:flex items-center space-x-4 mb-4 overflow-x-auto no-scrollbar">

                {{-- Search --}}
                <div class="mb-4 mx-4 sm:mx-0 sm:mb-0 sm:flex-grow sm:w-1/3 min-w-64">
                    <div class="relative">
                        <input wire:model.live='searchQuery' type="search" id="search" placeholder="Search..."
                            class="border-gray-300 rounded-md shadow-sm text-gray-800 pl-10 w-full">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            @svg('heroicon-s-magnifying-glass', 'w-5 h-5')
                        </div>
                    </div>
                </div>

                <!-- Categories -->
                <div class="flex space-x-2 overflow-x-auto no-scrollbar">
                    @foreach ($categories as $category)
                    <button
                        wire:click="toggleCategory({{ $category['id'] }})"
                        wire:loading.attr="disabled"
                        wire:target="toggleCategory({{ $category['id'] }})"
                        @class([
                            'flex-shrink-0 flex items-center rounded-lg p-2 transition duration-200 ease-in-out cursor-pointer border bg-white',
                            'border-indigo-500' => in_array($category['id'], $selectedCategories),
                            'hover:border-indigo-500 focus:outline-none' => !in_array($category['id'], $selectedCategories),
                        ])>

                        <!-- Loading Animation -->
                        <div wire:loading wire:target="toggleCategory({{ $category['id'] }})">
                            @svg('css-spinner', 'w-5 h-5 object-cover rounded-full mr-2 animate-spin text-indigo-500')
                        </div>
                        <div wire:loading.remove wire:target="toggleCategory({{ $category['id'] }})">
                            <img src="{{ $category['image_url'] }}" alt="{{ $category['name'] }}"class="w-5 h-5 object-cover rounded-full mr-2">
                        </div>
                        <span>{{ $category['name'] }}</span>
                    </button>
                    @endforeach
                </div>
            </div>

            <!-- Products -->
            <div class="container">
                <div class="flex flex-wrap">
                    @foreach ($products as $product)
                        <div class="flex grow justify-center items-center mb-2">
                            <button
                                wire:click="addToCart({{ $product['id'] }})"
                                wire:loading.attr="disabled"
                                wire:target="addToCart({{ $product['id'] }})"
                                @class([
                                    'border p-4 rounded-lg bg-white focus:outline-none cursor-pointer transition duration-200 ease-out shadow-md overflow-hidden',
                                    'border-indigo-500' => in_array($product['id'], $cartItemsProductIds),
                                    'hover:border-indigo-500 focus:outline-none' => !in_array($product['id'], $cartItemsProductIds),
                                ])>
        
                                <div>
                                    <div class="w-36 h-32 flex justify-center items-center">
                                        <!-- Loading Animation -->
                                        <div wire:loading wire:target="addToCart({{ $product['id'] }})">
                                            @svg('css-spinner', 'w-16 h-16 object-cover animate-spin text-indigo-500')
                                        </div>
                                        <div wire:loading.remove wire:target="addToCart({{ $product['id'] }})">
                                            <img src="{{ $product->image_url }}" alt="{{ $product['name'] }}" class="object-cover">
                                        </div>
                                    </div>
                                    
                                    <div class="mt-2">
                                        <h3 class="font-semibold">{{ $product['name'] }}</h3>
                                        <p class="text-indigo-500">{{ $product->price_formatted }}</p>
                                    </div>
                                </div>
                            </button>
                        </div>
                    @endforeach
                </div>

                <div class="mt-4">
                    {{ $products->links() }}
                </div>

            </div>
            
        </div>
        
        @if (count($cartItems) > 0)
        <div class="fixed bottom-0 left-0 right-0 bg-white shadow-lg">
            <div class="max-w-7xl mx-auto ">
                <div class="flex flex-row space-x-4 px-4 py-2">
                    
                    <button wire:click="clearCart" class="basis-1/3 flex items-center justify-center text-red-500 hover:text-white hover:bg-red-500 p-2 rounded transition-all ease-in-out duration-250 border border-red-500 w-full">
                        <div class="flex items-center space-x-2">
                            
                            <!-- Loading Animation -->
                            <div wire:loading wire:target="clearCart">
                                @svg('css-spinner', 'w-5 h-5 object-cover animate-spin')
                            </div>
                            <div wire:loading.remove wire:target="clearCart">
                                @svg('heroicon-s-trash', 'w-5 h-5')
                            </div>
                            <span>Clear</span>
                        </div>
                    </button>

                    <button class="basis-2/3 flex items-center justify-center text-white bg-indigo-500 hover:bg-indigo-800 p-2 rounded transition-all ease-in-out duration-250 border border-indigo-500 w-full">
                        <div class="flex items-center space-x-2">
                            <span>({{count($cartItems)}}) Continue</span>
                            
                            <!-- Loading Animation -->
                            <div wire:loading wire:target="continueCart">
                                @svg('css-spinner', 'w-5 h-5 object-cover animate-spin')
                            </div>
                            <div wire:loading.remove wire:target="continueCart">
                                @svg('heroicon-s-arrow-right', 'w-5 h-5')
                            </div>
                        </div>
                    </button>

                </div>
            </div>
        </div>
        @endif

    </div>
</div>