import { createWebHistory, createRouter } from "vue-router"
import Index from '../views/Index.vue'

const routes = [
    {
        path: '/delete',
        component: Index,
        name: 'Email form',
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router