import './bootstrap'

import { createApp } from 'vue'
import router from './router'

import App from './components/admin/App.vue'

// SweetAlerts
import VueSweetalert2 from 'vue-sweetalert2'
import 'sweetalert2/dist/sweetalert2.min.css'

// CKEditor
import CKEditor from '@ckeditor/ckeditor5-vue'

const app = createApp(App)

app.use(router).use(VueSweetalert2).use(CKEditor).mount('#app')