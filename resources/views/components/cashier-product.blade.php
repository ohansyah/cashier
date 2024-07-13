<div class="container mb-8">
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-2">
        @foreach ($products as $product)
        <div class="flex grow justify-center items-center mb-2">
            <button wire:click="addToCart({{ $product['id'] }})" wire:loading.attr="disabled"
                wire:target="addToCart({{ $product['id'] }})"
                @class([ 'border p-4 rounded-lg bg-white focus:outline-none cursor-pointer transition duration-200 ease-out shadow-md overflow-hidden'
                , 'border-indigo-500'=> in_array($product['id'], $cartItemsProductIds),
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
        @if ($hasMorePages)
        <div class="text-center">
            <!-- Loading Animation -->
            <div wire:loading wire:target="loadMore">
                @svg('css-spinner', 'w-8 h-8 object-cover rounded-full mr-2 animate-spin text-indigo-500')
            </div>
        </div>
        @endif
    </div>
</div>
