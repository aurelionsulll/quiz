
require('./bootstrap');

window.Vue = require('vue');
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
Vue.use(VueSweetalert2);
// app.use(VueSweetalert2);

// import Swal from 'sweetalert2'
// import 'sweetalert2/src/sweetalert2.scss'
// import Swal from 'sweetalert2'
// const Swal = require('sweetalert2')






Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Admin
Vue.component('gqst-component', require('./components/Gqst.vue').default);



const app = new Vue({
    el: '#app',
});
