<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"
        x-data = '{
            cartItems: [],
            addToCart(id, name, price) {
                exist_index = this.cartItems.findIndex(item => item.id === id);;
                if (exist_index < 0) {
                    this.cartItems.push({ "id": id, "name": name, "price": price });
                } else {
                    this.cartItems.splice(exist_index, 1);
                }
            }
        }'>

        <div class="w-full">
            <x-cashier-filter :categories="$categories" :selectedCategories="$selectedCategories"/>
            <x-cashier-product :products="$products" :hasMorePages="$hasMorePages"/>
        </div>
        
        <x-cashier-cart/>
        <x-cashier-summary :isOpen="$isOpen" :cartItems="$cartItems"/>

    </div>
</div>

<script>
    document.addEventListener('scroll', function() {
        if ((window.innerHeight + window.scrollY ) >= (document.body.offsetHeight)) {
            @this.call('loadMore');
        }
    });
</script>
