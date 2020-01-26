<template>
    <div class="cart_status">
        {{ cart_status() }} <a href="/cart/"> <template v-if="!is_cart_empty()"> Your cart </template></a>
    </div>
</template>

<script>
    export default {
        name: "CartStatus",
        data: function () {
            return {
            }
        },
        methods: {
            cart_status: function() {
                if (this.is_cart_empty()) {
                    return 'Your cart is empty';
                }
                let s = 0;
                s = s*this.$store.state.n;
                let n = 0;
                for (let i=0; i<this.$store.state.cart.items.length; i++) {
                    s += this.$store.state.cart.items[i].amount;
                    if (this.$store.state.cart.items[i].related_id === null) {
                        n += this.$store.state.cart.items[i].qty;
                    }
                }
                if (n===0) {
                    return 'Your cart is empty.';
                }
                return 'total ' + n + ' items with total cost ' + format_price(s);
            },
            is_cart_empty:  function () {
                if (!this.$store.state.cart_set) return true;
                if (!this.$store.state.cart.items) return true;
                return false;
            },
            format_price: function(value) {
                return format_price(value);
            },
        },
        computed: {
            cart:  function () {
                return this.$store.state.cart;
            },

        },
        created: function() {
            console.log('Cart Status Component created');
            console.log('Cart loading');

            let  self = this;

            this.$http.get('/cart/show').then(response=> {
                console.log('OK');
                let result =  response.body;
                console.log(result);
                if (result.status===1) {
                    console.log('cart loaded');
                    self.$store.commit('setCart', result.cart)
                }
                else {
                    console.log('cart empty');
                    self.$store.commit('resetCart')
                }
            }, error => {
                console.log('Error');
                console.error(error);
            });

            this.$http.get('/cart/currency').then(response=> {
                console.log('OK');
                let result =  response.body;
                console.log(result);
                if (result.status===1) {
                    console.log('currency loaded', result.currency);
                    self.$store.commit('setCurrency', result.currency)
                }
            }, error => {
                console.log('Error');
                console.error(error);
            });

        }
    }
</script>

<style scoped>

</style>
