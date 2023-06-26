const AllCustomers = () => import('./AllCustomers.vue')
const App = () => import('./App.vue')

export const routes = [
    {
        name: 'home',
        path: '/',
        component: App
    },
]