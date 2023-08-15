import './bootstrap'

import { createApp } from 'vue'
import router from './router'

import App from './components/admin/App.vue'

// SweetAlerts
import VueSweetalert2 from 'vue-sweetalert2'
import 'sweetalert2/dist/sweetalert2.min.css'

// CKEditor
import CKEditor from '@ckeditor/ckeditor5-vue'

import dayjs from 'dayjs'
import 'dayjs/locale/ru'
import utc from 'dayjs/plugin/utc'
dayjs.extend(utc)

const app = createApp(App).use(router).use(VueSweetalert2).use(CKEditor)

app.config.globalProperties.$dayjs = dayjs

app.mount('#admin')