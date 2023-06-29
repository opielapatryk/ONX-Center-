import 'bootstrap/dist/css/bootstrap.css'; //poprawny import
import './bootstrap';
import { createApp } from 'vue'
import AllCustomers from './AllCustomers.vue'
import router from "./routes"; 

createApp(AllCustomers).use(router).mount('#app');
