
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.prototype.$eventHub = new Vue();

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('add-credit', require('./components/AddCredit.vue'));
Vue.component('send-message', require('./components/SendMessage.vue'));
Vue.component('send-token', require('./components/SendToken.vue'));
Vue.component('upload-form', require('./components/UploadForm.vue'));
Vue.component('group-form', require('./components/GroupForm.vue'));
Vue.component('payment', require('./components/utilities/Payment.vue'));
Vue.component('flash', require('./components/utilities/flash.vue'));
Vue.component('confirm-delete', require('./components/utilities/deleteConfirmation.vue'));
Vue.component('generate-pdf', require('./components/utilities/GeneratePdf.vue'));
Vue.component('animate-text', require('./components/utilities/animateText.vue'));
Vue.component('show-hide-filter', require('./components/utilities/ShowHideFilter.vue'));


const app = new Vue({
    el: '#app'
});
