/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('cart-status', require('./components/CartStatus.vue').default);
Vue.component('cart-editor', require('./components/CartEditor.vue').default);
Vue.component('cart-add', require('./components/CartAdd.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import VueResource from 'vue-resource'
Vue.use(VueResource);

// import VeeValidate, { Validator } from 'vee-validate';
import ru from 'vee-validate/dist/locale/ru';
// Vue.use(VeeValidate, veeValidateConfig);

// const veeValidateConfig = {
//     aria: true,
//     classes: true,
//     delay: 0,
//     dictionary: null,
//     events: 'change|blur',
//     fieldsBagName: 'veeFields',
//     errorBagName: 'veeErrors',
//     i18n: null,
//     i18nRootKey: 'validations',
//     inject: true,
//     locale: 'ru',
//     validity: false,
//     classNames: {
//         valid: 'is-valid',
//         invalid: 'is-invalid'
//     }
// };

import Vuex from 'vuex'
import {STORE} from './store'
Vue.use(Vuex);
const store = new Vuex.Store(STORE);

window.format_price = function (value) {
    console.log('store.state.currency', store.state.currency);
    let currency = store.state.currency;
    console.log('currency', currency);
    value = value / currency.rate;
    value = (Math.round(value * 100) / 100).toFixed(2);
    if (currency.sign_before) {
        value = currency.sign + value;
    }
    else {
        value = value + currency.sign;
    }
    return value;
}

const app = new Vue({
    el: '#app',
    store:store,
});
