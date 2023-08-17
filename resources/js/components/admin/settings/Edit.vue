<template>
    <div class="subheader w-100 mb-4">
        <div class="row align-items-center">
            <div class="col-12">
                <h1>Общие настройки</h1>
            </div>
        </div>
    </div>

    <Loader v-if="views.loading" />

    <div v-if="!views.loading" class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <div class="w-100">
            <div class="box mb-4 p-4">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Телефон</label>
                            <input v-model="tel1" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Второй телефон</label>
                            <input v-model="tel2" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">E-mail</label>
                            <input v-model="email" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Адрес</label>
                            <input v-model="address" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Ссылка на VK</label>
                            <input v-model="vk_link" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Ссылка на Instagram</label>
                            <input v-model="instagram_link" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <button @click="save()" class="btn btn-primary mb-4">Сохранить</button>
        </div>
    </div>
</template>

<script>
import Loader from '../Loader.vue'

export default {
    data() {
        return {
            settings: {},

            tel1: '',
            tel2: '',
            email: '',
            address: '',
            vk_link: '',
            instagram_link: '',

            views: {
                loading: true,
            },
        }
    },
    created() {
        this.loadSettings()
    },
    methods: {
        loadSettings() {
            axios.get('/_admin/settings')
            .then(response => {
                this.settings = response.data

                this.tel1 = response.data.tel1
                this.tel2 = response.data.tel2
                this.email = response.data.email
                this.address = response.data.address
                this.vk_link = response.data.vk_link
                this.instagram_link = response.data.instagram_link

                this.views.loading = false
            })
        },
        save() {
            if(!this.tel1.length) {
                return this.$swal({
                    text: 'Укажите телефон',
                    icon: 'error',
                })
            }
            if(this.tel1.length > 10 || this.tel2.length > 10 || this.tel1.includes("-") || this.tel1.includes(" ") || this.tel2.includes("-") || this.tel2.includes(" ")) {
                return this.$swal({
                    text: 'Укажите только цифры телефона - слитно, без пробелов, без тире и без 8 или +7',
                    icon: 'error',
                })
            }
            if(!this.tel2.length) {
                return this.$swal({
                    text: 'Укажите второй телефон',
                    icon: 'error',
                })
            }
            if(!this.email.length) {
                return this.$swal({
                    text: 'Укажите E-mail',
                    icon: 'error',
                })
            }
            if(!this.address.length) {
                return this.$swal({
                    text: 'Укажите адрес',
                    icon: 'error',
                })
            }
            if(!this.vk_link.length) {
                return this.$swal({
                    text: 'Укажите ссылку на VK',
                    icon: 'error',
                })
            }
            if(!this.instagram_link.length) {
                return this.$swal({
                    text: 'Укажите ссылку на Instagram',
                    icon: 'error',
                })
            }

            axios.post('/_admin/settings', {
                tel1: this.tel1,
                tel2: this.tel2,
                email: this.email,
                address: this.address,
                vk_link: this.vk_link,
                instagram_link: this.instagram_link,
            })
            .then(response => {
                this.$router.push({ name: 'Leads'})
            })
            .catch(errors => {
                return this.$swal({
                    text: 'Ошибка',
                    icon: 'error',
                })
            })
        }
    },
    components: {
        Loader
    }
}
</script>