import { createRouter, createWebHistory } from 'vue-router'
import AllCustomers from './AllCustomers.vue'
import ListCustomer from './ListCustomer.vue'
import CreateCustomer from './CreateCustomer.vue'
import EditCustomer from './EditCustomer.vue'
const routes = [
    {
      path: '/',
      name: 'AllCustomers',
      component: AllCustomers
    },
    {
      path: '/customer/:id',
      name: 'ListCustomer',
      component: ListCustomer
    },
    {
      path: '/create/',
      name: 'CreateCustomer',
      component: CreateCustomer
    },{
      path: '/edit/',
      name: 'EditCustomer',
      component: EditCustomer
    },
  ]
const router = createRouter({
  history: createWebHistory(),
  routes
})
export default router