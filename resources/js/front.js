import './bootstrap'

import { createApp } from 'vue'

import CreateLead from './components/front/CreateLead.vue'
import CreateMiniLead from './components/front/CreateMiniLead.vue'

const app = createApp({})

app.component('create-lead', CreateLead)
app.component('create-mini-lead', CreateMiniLead)

app.mount('#front')