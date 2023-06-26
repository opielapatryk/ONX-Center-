import 'bootstrap/dist/css/bootstrap.css'; //poprawny import
import { createRouter, createWebHistory } from 'vue-router';
import AllCustomers from './AllCustomers.vue';
import ListCustomer from './ListCustomer.vue';
import './bootstrap';
import { createApp,h} from 'vue';
 
const routes = [
    {
      path: '/',
      name: 'allCustomers',
      component: AllCustomers,
    },
    {
      path: '/list-customer/:id',
      name: 'listCustomer',
      component: ListCustomer,
    },
  ];
  
  const router = createRouter({
    history: createWebHistory(),
    routes,
  });

createApp(AllCustomers).use(router).mount('#app');
