<div>

    @if($isOpen)
    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
                    @click.away="$wire.call('closeModal')">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Cart List</h3>

                                <div class="mt-2">
                                    @foreach ( $cartItems as $cartItem )
                                    <div class="flex justify-between">
                                        <div>
                                            <p>{{ $cartItem['name'] }}</p>
                                        </div>
                                        <div>
                                            <p>{{ $cartItem['quantity'] * $cartItem['price'] }}</p>
                                        </div>
                                    </div>

                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button {{-- wire:click="checkout" --}} type="button"
                            class="inline-flex w-full justify-center rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-800 sm:ml-3 sm:w-auto">Deactivate</button>
                        <button wire:click="closeModal" type="button"
                            class="mt-3 inline-flex w-full justify-center rounded-md px-3 py-2 text-sm font-semibold shadow-sm text-red-500 border border-red-500 hover:text-white hover:bg-red-500 sm:mt-0 sm:w-auto">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

</div>