<template>
    <div class="mini-form-form">
        <input v-model="tel" type="text" class="form-control" placeholder="Введите телефон для связи">
        <button v-if="!views.success" @click="save()" class="btn btn-primary">Получить скидку 10%</button>
    
        <div v-if="views.success" class="alert alert-success mt-3">
            Заявка успешно отправлена!
        </div>

        <div v-if="errors.length" class="alert alert-danger mt-3">
            <span v-for="error in errors" class="d-block"><small>{{ error }}</small></span>
        </div>
    </div>
</template>

<script>
export default {
    props: ['form_id'],
    data() {
        return {
            tel: '',

            errors: [],

            views: {
                success: false,
            }
        }
    },
    created() {
        //
    },
    methods: {
        save() {
            this.errors = []

            if(!this.tel.length) {
                return this.errors.push('Укажите телефон')
            }

            axios.post('/_leads', {
                name: '—',
                tel: this.tel,
                text: 'Получить скидку 10%',
            })
            .then(response => {
                this.tel = ''

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