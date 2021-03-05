
require('./bootstrap');

window.Vue = require('vue');
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
Vue.use(VueSweetalert2);


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Admin
Vue.component('gqst-component', require('./components/Gqst.vue').default);
Vue.component('gtest-component', require('./components/Gtest.vue').default);




const app = new Vue({
    el: '#app',
});
