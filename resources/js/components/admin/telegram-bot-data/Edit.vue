<template>
    <div class="subheader w-100 mb-4">
        <div class="row align-items-center">
            <div class="col-12">
                <h1>Настройки Telegram бота</h1>
            </div>
        </div>
    </div>

    <Loader v-if="views.loading" />

    {{ pagesPrices }}

    <div v-if="!views.loading" class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <div class="w-100">
            <div class="box mb-4 p-4">
                <div class="row">
                    <div v-for="page in pages" class="col-12 col-lg-6">
                        <div class="mb-3">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-8 text-end">
                                    <label class="form-label m-0">{{ page.name }}</label>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <input v-model="pagesPrices.find(p => p.id == page.id).tgprice" type="number" min="1" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="box mb-4 p-4">
                <div class="mb-3">
                    <label class="form-label">Текст "О нас"</label>
                    <textarea v-model="about_text" class="form-control"></textarea>
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
            pages: [],
            telegram_bot_data: {},

            pagesPrices: [],
            about_text: '',
            prices_text: '',

            views: {
                loading: true,
            },
        }
    },
    created() {
        this.loadTelegramBotData()
    },
    methods: {
        loadTelegramBotData() {
            axios.get('/_admin/telegram-bot-data')
            .then(response => {
                this.pages = response.data.pages

                response.data.pages.forEach(p => {
                    this.pagesPrices.push({id: p.id, tgprice: p.tgprice})
                })

                this.telegram_bot_data = response.data.telegram_bot_data

                this.about_text = response.data.telegram_bot_data.about_text
                this.prices_text = response.data.telegram_bot_data.prices_text

                this.views.loading = false
            })
        },
        save() {
            if(!this.about_text.length) {
                return this.$swal({
                    text: 'Напишите текст О нас',
                    icon: 'error',
                })
            }

            this.pagesPrices.forEach(p => {
                if(!p.tgprice) {
                    return this.$swal({
                        text: 'Укажите цены',
                        icon: 'error',
                    })
                }
            })

            return alert('ok')

            axios.post('/_admin/telegram-bot-data', {
                pages: this.pagesPrices,
                about_text: this.about_text,
                prices_text: this.prices_text,
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