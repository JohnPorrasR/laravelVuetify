require('./bootstrap');
import Vuetify from 'vuetify'

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/*const app = new Vue({
    el: '#app',
});*/

Vue.use(Vuetify);

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
});
