import { createApp } from 'vue'
import App from '@/App.vue'
import '@/index.css'
import routes from './router'

const app = createApp(App)

app.use(routes)

app.mount('#app')
