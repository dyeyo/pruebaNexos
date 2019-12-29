require('./bootstrap');

window.Vue = require('vue');

Vue.component('usuarios', require('./components/Usuarios.vue').default);
Vue.component('registro_completo', require('./components/RegistroCompleto.vue').default);
Vue.component('movimientos', require('./components/Movimientos.vue').default);
Vue.component('cajeros', require('./components/Cajeros.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
