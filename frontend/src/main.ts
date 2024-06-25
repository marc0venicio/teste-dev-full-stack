import { createApp } from 'vue'
import { createPinia } from 'pinia'
import { vuetify } from './plugins/vuetify'
import { registerLayouts } from './layouts/register'
import router from '@/router'
import App from './App.vue'

const app = createApp(App)
registerLayouts(app)
app.use(createPinia())
app.use(vuetify)
app.use(router)
app.mount('#app')
