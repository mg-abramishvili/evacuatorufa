<template>
    <div class="row align-items-center">
        <div class="col-12 col-lg-4">
            <img src="/img/contact-circle.png" alt="">
        </div>
        <div class="col-12 col-lg-4">
            <div v-for="(transport, index) in transports" class="form-check">
                <input class="form-check-input" type="radio" v-model="selected.transport" :id="form_id + '_' + index" :value="transport">
                <label class="form-check-label" :for="form_id + '_' + index">
                    {{ transport }}
                </label>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <input type="text" v-model="name" class="form-control" placeholder="Имя">
            <input type="text" v-model="tel" class="form-control" placeholder="Телефон">

            <button v-if="!views.success" @click="save()" class="btn btn-primary">Заказать со скидкой</button>
            
            <div v-if="views.success" class="alert alert-success mt-3">
                Заявка успешно отправлена!
            </div>

            <div v-if="errors.length" class="alert alert-danger mt-3">
                <span v-for="error in errors" class="d-block"><small>{{ error }}</small></span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['form_id'],
    data() {
        return {
            transports: [
                'Для легкового авто',
                'Для кроссовера',
                'Для внедорожника',
                'Для спецтехники',
                'Для другого транспорта',
            ],

            name: '',
            tel: '',
            
            selected: {
                transport: '',
            },

            errors: [],

            views: {
                success: false,
            }
        }
    },
    created() {
        this.selected.transport = this.transports[0]
    },
    methods: {
        save() {
            this.errors = []

            if(!this.name.length) {
                return this.errors.push('Укажите имя')
            }

            if(!this.tel.length) {
                return this.errors.push('Укажите телефон')
            }

            if(!this.selected.transport.length) {
                return this.errors.push('Укажите транспорт')
            }

            axios.post('/_leads', {
                name: this.name,
                tel: this.tel,
                text: this.selected.transport,
            })
            .then(response => {
                this.name = ''
                this.tel = ''
                this.selected.transport = this.transports[0]

                this.views.success = true

                setTimeout(() => {
                    this.views.success = false
                }, 3000)
            })
            .catch(errors => {
                this.errors.push('Ошибка на сервере')
            })
        },
    },
}
</script>