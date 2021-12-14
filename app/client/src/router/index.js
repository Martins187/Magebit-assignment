import { createWebHistory, createRouter } from "vue-router"
import Index from '@/views/Index.vue'
import Data from '@/views/Data.vue'

const routes = [
    {
        path: '/',
        component: Index,
        name: 'index',
    },
    {
        path: '/data',
        component: Data,
        name: 'Data',
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router