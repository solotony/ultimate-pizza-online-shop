<template>
    <div v-if="product_is_loaded">
        <table>
            <tr>
                <td>
                    <label for="qty">Quantity</label>
                </td>
                <td>
                    <input type="number" min="1" max="100" step="1" v-model="qty" id="qty" /><br>
                </td>
            </tr>
            <tr v-if="product.units_instock.length>1">
                <td>
                    <label for="unit">Offer</label>
                </td>
                <td>
                    <select v-model="unit" id="unit">
                        <option  v-for="t in product.units_instock" :value="t.id">
                            <template v-if="t.width">width: {{ t.width }} &nbsp; &nbsp;</template>
                            <template v-if="t.size">size: {{ t.size }} &nbsp; &nbsp;</template>
                            <template v-if="t.volume">volume: {{ t.volume }} &nbsp; &nbsp;</template>
                        </option>
                    </select>
                </td>
            </tr>
            <tr v-if="product.subcategory.toppings.length">
                <td>
                    <label for="toppings">Toppings</label>
                </td>
                <td>
                    <select v-model="toppings" id="toppings" multiple>
                        <option v-for="t in product.subcategory.toppings" :value="t.id">{{ t.name }}</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <strong>Total price: {{ format_price(total_price) }}</strong>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button @click="add">Add to cart</button>
                </td>
            </tr>
        </table>
    </div>
</template>

<script>
    export default {
        name: "CartAdd",
        props: [
            'product_id'
        ],
        data: function () {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                product:null,
                qty:1,
                toppings:[],
                unit:null
            }
        },
        methods: {
            add: function() {
                let data = JSON.stringify({qty:this.qty, toppings:this.toppings, unit:this.unit});
                let formdata = new FormData();
                formdata.append('_token', this.csrf);
                formdata.append('data', data);
                let  self = this;
                this.$http.post('/cart/add/'+this.unit, formdata).then(response=> {
                    let result =  response.body;
                    console.log(result);
                    if (result.status===1) {
                        console.log('setCart - call');
                        console.log('self = ', self);
                        self.$store.commit('resetCart')
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
            format_price: function(value) {
                return format_price(value);
            },
        },
        computed: {
            product_is_loaded: function (){
                return this.product !== null;
            },
            total_price: function() {
                let t = 0;

                for (let j=0; j<this.toppings.length; j++) {
                    //console.log('j=', j);
                    for (let i=0; i<this.product.subcategory.toppings.length; i++) {
                        // console.log('i=', i);
                        // console.log('this.product', this.product);
                        // console.log('this.product.subcategory', this.product.subcategory);
                        // console.log('this.product.subcategory.toppings', this.product.subcategory.toppings);
                        // console.log('this.product.subcategory.toppings[i]', this.product.subcategory.toppings[i]);
                        // console.log('this.product.subcategory.toppings[i].unit', this.product.subcategory.toppings[i].unit);
                        if (this.product.subcategory.toppings[i].mainunit.id === this.toppings[j]) {
                            t += this.product.subcategory.toppings[i].mainunit.price;
                        }
                    }
                }

                for (let i=0; i<this.product.units_instock.length; i++) {
                    if (this.product.units_instock[i].id === this.unit) {
                        t += this.product.units_instock[i].price;
                    }
                }

                return t * this.qty;
            }
        },
        created:function () {
            this.$http.get('/cart/product/'+this.product_id).then(response=> {
                console.log('OK');
                let result =  response.body;
                console.log(result);
                if (result.status===1) {
                    console.log('product loaded');
                    this.product = result.product;
                    this.unit = this.product.units_instock[0].id;
                }
                else {
                    console.log('product failed');
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
