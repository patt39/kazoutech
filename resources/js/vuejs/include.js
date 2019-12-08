

window.Vue = require('vue');
Vue.use(require('vue-resource'));

import 'es6-promise/auto';
import Vuex from 'vuex';
Vue.use(Vuex);


/**
 * VeeValidate
 */
import { ValidationProvider, extend } from 'vee-validate';
Vue.component('ValidationProvider', ValidationProvider);


import {Form, HasError, AlertError, AlertSuccess} from 'vform'

window.Form = Form;

Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
Vue.component(AlertSuccess.name, AlertSuccess);


/**
 * Router vuejs
 */
import VueRouter from 'vue-router'
Vue.use(VueRouter);

/**
 * Stars Rating
 */
import rate from 'vue-rate';
Vue.use(rate);



import {routes} from './routes/routes';

/**
 * Router site
 * @type {VueRouter}
 */
const router = new VueRouter({
    routes,
    mode: 'history',
    linkActiveClass: "active",
    linkExactActiveClass: "active", // active class for *exact* links.
})



/**
 * Ici c'est pour le filtre
 */
import Vue2Filters from 'vue2-filters'
Vue.use(Vue2Filters);

/**
 * Ici c'est pour le number
 */
import VueTheMask from 'vue-the-mask'
Vue.use(VueTheMask);




/**
 * Vue-select
 */
import vSelect from 'vue-select'
Vue.component('v-select', vSelect);



/**
 * Ici c'est pour configurer les alerts surtout le sweetalert2
 */
import Swal from 'sweetalert2';

window.swal = swal;
const toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
window.toast = toast;


/** Ici c'est pour configurer le progressbar se referer a la documentation
 * https://github.com/hilongjw/vue-progressbar#requirements
 */
import VueProgressBar from 'vue-progressbar'

Vue.use(VueProgressBar, {
    color: 'green',
    ailedColor: 'red',
    thickness: '4px',
    height: '2px',
    transition: {
        speed: '0.2s',
        opacity: '0.6s',
        termination: 300
    },
    autoRevert: true,
    location: 'top',
    inverse: false
});


Vue.filter('upText', function (text) {
    return text.charAt(0).toUpperCase() + text.slice(1);
});
Vue.filter('reverse', function(value) {
    // slice to make a copy of array, then reverse the copy
    return value.slice().reverse();
});

/** Ici c'est pour configurer les date se referer a la documentation
 * pour plus d'information visiter ce lien
 * https://momentjs.com
 */

import moment from 'moment'

require("moment/min/locales.min");
moment.locale('fr');

Vue.filter('myDate', function (created) {
    return moment(created).format('ll');
});

Vue.filter('ageDate', function (created) {
    return moment(created).format('l');
});

Vue.filter('formatDate', function (value) {
    if (value) {
        return moment(String(value)).format('DD/MM/YYYY');
    }
});

Vue.filter('formatDateAndHour', function (value) {
    if (value) {
        return moment(String(value)).format('DD/MM/YYYY HH:mm:ss');
    }
});

Vue.filter('dateFormat', function (created) {
    return moment(created).format('lll'); // mars 2 2019, 12:32:56 pm
});

Vue.filter('dateAgo', function (created) {
    return moment(created).fromNow(); // date ago
});

Vue.filter('dateCalendar', function (created) {
    return moment(created).calendar();  // Today at 4:39 PM
});

Vue.filter('toCurrency', function (value) {
    if (typeof value !== "number") {
        return value;
    }
    var formatter = new Intl.NumberFormat('en-US', {

        minimumFractionDigits: 0
    });
    return formatter.format(value);
});



import InfiniteLoading from 'vue-infinite-loading';
Vue.use(InfiniteLoading);


/**
 * VueEditor
 */
import {VueEditor, Quill} from "vue2-editor";

Vue.component('VueEditor', VueEditor);
Vue.component('Quill', Quill);


import VueQuillEditor from 'vue-quill-editor'
Vue.use(VueQuillEditor);

window.Fire = new Vue();


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('error-404', require('./components/inc/alert/Error404').default);
Vue.component('pagination-link', require('./components/inc/vendor/PaginationComponent').default);
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('alert-permission', require('./components/inc/admin/components/AlertPermission').default);
Vue.component('errored-loading', require('./components/inc/animation/Errored').default);
Vue.component('link-verify', require('./components/user/auth/LinkVerify').default);
Vue.component('newsletter-index', require('./components/user/newsletter/NewsletterIndex').default);
Vue.component('loader-ellipsis', require('./components/inc/animation/LoaderEllipsis').default);
Vue.component('nav-admin', require('./components/inc/admin/NavAdmin').default);
Vue.component('top-nav', require('./components/inc/admin/TopNav').default);
Vue.component('footer-admin', require('./components/inc/admin/FooterAdmin').default);
Vue.component('contact-us', require('./components/user/contact/ContactUser').default);

/**
 *User site include
 */

Vue.component('footer-user-site', require('./components/inc/user/FooterUserSite').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
if (document.getElementById('app') !== null){
    const app = new Vue({
        el: '#app',
        router
    });
}
