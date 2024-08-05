<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"
        x-data = '{
            isShowSummary:false,
            cartItems: [],
            subTotal: 0,

            addToCart(id, name, price, priceFormated, imageUrl, qty) {
                exist_index = this.cartItems.findIndex(item => item.id === id);;
                if (exist_index < 0) {
                    this.cartItems.push({
                        "id": id,
                        "name": name,
                        "price": price,
                        "priceFormated": priceFormated,
                        "imageUrl": imageUrl,
                        "qty": 1,
                        "total": price,
                    });
                } else {
                    this.cartItems.splice(exist_index, 1);
                }
            },
            increaseQuantity(id){
                exist_index = this.cartItems.findIndex(item => item.id === id);
                this.cartItems[exist_index].qty++;
                this.cartItems[exist_index].total = this.cartItems[exist_index].qty * this.cartItems[exist_index].price;
            },
            decreaseQuantity(id){
                exist_index = this.cartItems.findIndex(item => item.id === id);
                if(this.cartItems[exist_index].qty > 1){
                    this.cartItems[exist_index].qty--;
                    this.cartItems[exist_index].total = this.cartItems[exist_index].qty * this.cartItems[exist_index].price;
                }
            },
            deleteItem(id){
                exist_index = this.cartItems.findIndex(item => item.id === id);
                this.cartItems.splice(exist_index, 1);
            },
            formatCurrency(value) {
                return Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" }).format(value).replace(/\s/g, "").split(",")[0];
            },
            calculateSubTotal(){
                this.subTotal = this.cartItems.reduce((acc, item) => acc + (item.price * item.qty), 0);
            }
        }'
        x-init="$watch('cartItems', () => calculateSubTotal())">

        <div class="w-full">
            <x-cashier-filter :categories="$categories" :selectedCategories="$selectedCategories"/>
            <x-cashier-product :products="$products" :hasMorePages="$hasMorePages"/>
        </div>
        
        <x-cashier-cart/>
        <x-cashier-summary/>

    </div>
</div>

<script>
    document.addEventListener('scroll', function() {
        if ((window.innerHeight + window.scrollY ) >= (document.body.offsetHeight)) {
            @this.call('loadMore');
        }
    });
</script>
