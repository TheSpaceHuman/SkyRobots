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

Vue.component('index-form', require('./components/forms/IndexForm.vue').default);
Vue.component('register-form', require('./components/forms/RegisterForm.vue').default);
Vue.component('city-choose', require('./components/controls/CityChoose.vue').default);
Vue.component('referral-tree', require('./components/tree/ReferralTree.vue').default);
Vue.component('binary-branch', require('./components/tree/BinaryBranch.vue').default);
Vue.component('linear-branch', require('./components/tree/LinearBranch.vue').default);
Vue.component('binary-branch-all', require('./components/tree/BinaryBranchAll.vue').default);
Vue.component('the-preloader', require('./components/helpers/ThePreloader.vue').default);
Vue.component('referral-link', require('./components/helpers/ReferralLink.vue').default);
Vue.component('tariff-selection', require('./components/helpers/TariffSelection.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// Plugins
// element-ui
import lang from 'element-ui/lib/locale/lang/ru-RU'
import locale from 'element-ui/lib/locale'
locale.use(lang)
import ElSelect from 'element-ui/lib/select.js'
import ElOption from 'element-ui/lib/option.js'
import ElTabs from 'element-ui/lib/tabs'
import ElTabPane from 'element-ui/lib/tab-pane'
import ElLoading from 'element-ui/lib/loading'
import ElTree from 'element-ui/lib/tree'
Vue.use(ElSelect)
Vue.use(ElOption)
Vue.use(ElTabs)
Vue.use(ElTabPane)
Vue.use(ElLoading)
Vue.use(ElTree)


import VueTheMask from 'vue-the-mask'
Vue.use(VueTheMask)

import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)

const app = new Vue({
    el: '#app',
});