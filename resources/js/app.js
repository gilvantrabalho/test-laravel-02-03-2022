
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// import BootstrapVue from 'bootstrap-vue' //Importing

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
// Vue.use(BootstrapVue) // Telling Vue to use this in whole application

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('posts', require('./components/Posts.vue').default);
Vue.component('modal-component', require('./components/ModalComponent.vue').default);
Vue.component('card-item-component', require('./components/CardItemComponent.vue').default);
// Vue.component('my-table-component', require('./components/MyTableComponent.vue').default);
Vue.component('card-component', require('./components/CardComponent.vue').default);
Vue.component('table-component', require('./components/TableComponent.vue').default);
Vue.component('container-body-component', require('./components/ContainerBodyComponent').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
