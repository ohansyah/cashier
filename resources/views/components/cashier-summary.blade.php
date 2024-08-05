<div x-show="isShowSummary" x-transition
    class="fixed inset-0 z-10 flex items-center justify-center bg-gray-200 bg-opacity-75 transition-opacity" 
    role="dialog" aria-modal="true" aria-labelledby="modal-title">
    
    <div @click.away="isShowSummary = false" 
         class="relative w-full max-w-2xl p-4 bg-white rounded-lg shadow-xl transition-all">
        
        <div class="p-4">
            <div class="w-full justify-center">
                <div class="mt-3 text-center sm:mt-0 sm:text-left">
                    <h3 id="modal-title" class="text-base font-semibold leading-6 text-gray-900">Cart List</h3>

                    <div class="mt-2">
                        <template x-for="item in cartItems" :key="item.id">
                            <div class="grid grid-cols-6 grid-rows-2 gap-2 items-center py-2 border-b justify-items-stretch" x-transition>
                                <div class="row-span-2 col-span-1">
                                    <img :src="item.imageUrl" alt="Product Image" class="object-cover rounded-lg w-16 h-16">
                                </div>
                                <div class="col-span-3 justify-self-start">
                                    <p x-text="item.name" class="text-gray-700"></p>
                                </div>
                                <div class="col-span-3 justify-self-start flex items-center space-x-2">
                                    <p x-text="item.priceFormated" class="text-gray-700"></p>
                                    <button @click="decreaseQuantity(item.id)" class="px-2 py-1 text-sm font-medium text-gray-700 bg-gray-200 rounded hover:bg-gray-300">
                                        -
                                    </button>
                                    <p x-text="item.qty" class="text-gray-700"></p>
                                    <button @click="increaseQuantity(item.id)" class="px-2 py-1 text-sm font-medium text-gray-700 bg-gray-200 rounded hover:bg-gray-300">
                                        +
                                    </button>
                                    <button @click="deleteItem(item.id)" class="px-2 py-1 text-sm font-medium text-red-500 bg-red-100 rounded hover:bg-red-200">
                                        @svg('heroicon-s-trash', 'w-5 h-5')
                                    </button>
                                </div>
                                <div class="row-span-2 col-span-2 justify-self-end">
                                    <p x-text="formatCurrency(item.total)" class="font-semibold text-gray-700"></p>
                                </div>
                            </div>
                        </template>
                        <div class="grid grid-cols-3 gap-3 items-center py-2 justify-items-stretch" x-transition>
                            <div class="col-span-1">
                                <p class="text-gray-700">Sub Total</p>
                            </div>
                            <div class="col-span-2 justify-self-end">
                                <p x-text="formatCurrency(subTotal)" class="text-xl font-semibold leading-6 text-gray-900"></p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="sm:flex sm:flex-row-reverse sm:pt-4">
                <button {{-- wire:click="checkout" --}} type="button"
                    class="inline-flex w-full justify-center rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-800 sm:ml-3 sm:w-auto">Checkout</button>
                <button @click="isShowSummary = false" type="button"
                    class="mt-3 inline-flex w-full justify-center rounded-md border border-red-500 px-3 py-2 text-sm font-semibold text-red-500 shadow-sm hover:bg-red-500 hover:text-white sm:mt-0 sm:w-auto">Cancel</button>
            </div>

        </div>
    </div>
</div>
