import Vue from 'vue';
import VueRouter from 'vue-router';
import AllCustomers from './AllCustomers.vue';
import App from './App.vue';
import ListCustomer from './ListCustomer.vue';
import AllCustomers from './AllCustomers.vue';
import { createRouter, createWebHistory } from 'vue-router';


Vue.use(VueRouter);

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

new Vue({
  router,
  render: h => h(App)
}).$mount('#app');
