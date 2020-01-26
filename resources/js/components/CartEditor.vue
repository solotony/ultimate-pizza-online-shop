<template>
    <div>
        <table class="cart-table" v-if="!is_cart_empty">
            <template v-for="item in cart.items">
                <tr v-if="!item.related_id">
                    <td><strong>{{ item.name }}</strong></td>
                    <td><strong>{{ item.qty }}</strong></td>
                    <td><strong>{{ format_price(item.price) }}</strong></td>
                    <td><strong>{{ format_price(item.amount) }}</strong></td>
                    <td>
                        <button @click="inc(item.id)">+</button>
                        <button @click="dec(item.id)">-</button>
                        <button @click="set0(item.id)">Х</button>
                    </td>
                </tr>
                <tr v-if="item.related_id">
                    <td><small>{{ item.name }}</small></td>
                    <td> &nbsp; </td>
                    <td><small>{{ format_price(item.price) }}</small></td>
                    <td><small>{{ format_price(item.amount) }}</small></td>
                    <td></td>
                </tr>
            </template>
            <tr class="cart-table__total">
                <td><strong>Total</strong></td>
                <td><strong>{{ cart_count }}</strong></td>
                <td><strong></strong></td>
                <td><small>{{ format_price(cart_summ) }}</small></td>
                <td></td>
            </tr>
        </table>
    </div>
</template>

<script>
    import { functions } from '../functions.js';

    export default {
        name: "CartEditor",
        mixins: [functions,],
        data: function () {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },
        computed: {
            cart:  function () {
                return this.$store.state.cart;
            },
            cart_count:  function () {
                if (this.is_cart_empty) return 0;
                let s = 0;
                let n = 0;
                for (let i=0; i<this.$store.state.cart.items.length; i++) {
                    s += this.$store.state.cart.items[i].amount;
                    if (this.$store.state.cart.items[i].related_id === null) {
                        n += this.$store.state.cart.items[i].qty;
                    }
                }
                if (n===0) return 0
                return n;
            },
            cart_summ:  function () {
                if (this.is_cart_empty) return 0;
                let s = 0;
                let n = 0;
                for (let i=0; i<this.$store.state.cart.items.length; i++) {
                    s += this.$store.state.cart.items[i].amount;
                    if (this.$store.state.cart.items[i].related_id === null) {
                        n += this.$store.state.cart.items[i].qty;
                    }
                }
                if (n===0) return 0
                return s;
            },

            is_cart_empty:  function () {
                if (!this.$store.state.cart_set) return true;
                if (!this.$store.state.cart.items) return true;
                return false;
            },
        },
        methods: {
            inc: function(item_id){
                let formdata = new FormData();
                formdata.append('_token', this.csrf);
                let  self = this;
                this.$http.post('/cart/inc/'+item_id+'/', formdata).then(response=> {
                    console.log('OK');
                    let result =  response.body;
                    console.log(result);
                    if (result.status===1) {
                        console.log('setCart - call');
                        console.log('self = ', self);
                        self.$store.commit('setCart', result.cart)
                    }
                    else {
                        console.log('add failed');
                    }
                }, error => {
                    console.log('Error');
                    console.error(error);
                });
            },
            dec: function(item_id){
                let formdata = new FormData();
                formdata.append('_token', this.csrf);
                let  self = this;
                this.$http.post('/cart/dec/'+item_id+'/', formdata).then(response=> {
                    console.log('OK');
                    let result =  response.body;
                    console.log(result);
                    if (result.status===1) {
                        console.log('setCart - call');
                        console.log('self = ', self);
                        self.$store.commit('setCart', result.cart)
                    }
                    else {
                        console.log('add failed');
                    }
                }, error => {
                    console.log('Error');
                    console.error(error);
                });
            },
            set0: function(item_id){
                let formdata = new FormData();
                formdata.append('_token', this.csrf);
                formdata.append('count', 0);
                let  self = this;
                this.$http.post('/cart/set/'+item_id+'/', formdata).then(response=> {
                    console.log('OK');
                    let result =  response.body;
                    console.log(result);
                    if (result.status===1) {
                        console.log('setCart - call');
                        console.log('self = ', self);
                        self.$store.commit('setCart', result.cart)
                    }
                    else {
                        console.log('add failed');
                    }
                }, error => {
                    console.log('Error');
                    console.error(error);
                });
            },
        },
    }
</script>

<style scoped>

</style>
