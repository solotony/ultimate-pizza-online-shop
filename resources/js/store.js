let STORE = {
    state: {
        cart: {},
        cart_set:false,
        n:0,
        currency: {rate:1, sign:'', sign_before:false}
    },
    mutations: {
        setCart: function (state, new_cart) {
            state.cart = Object.assign({}, new_cart);
            state.n++;
            state.cart_set = true;
        },
        resetCart: function (state) {
            Object.assign(state.cart, {});
            state.n++;
            state.cart_set = true;
        },
        setCurrency: function (state, new_currency) {
            state.currency = Object.assign({}, new_currency);
        }
    }
}

export {STORE}
