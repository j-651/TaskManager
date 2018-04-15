/*
 * Source code © Copyright 2018-Present Jay S. (j-651) -> https://github.com/j-651/TaskManager
 * Licensed under MIT -> https://opensource.org/licenses/MIT
 */

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')

window.Vue = require('vue')

import Buefy from 'buefy'
Vue.use(Buefy, {
    defaultIconPack: 'fas'
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });

require('./fontawesome/solid')
require('./fontawesome/fontawesome')
require('./navbar-burger')