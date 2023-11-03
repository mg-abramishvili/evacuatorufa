<template>
    <div class="subheader w-100 mb-4">
        <div class="row align-items-center">
            <div class="col-12">
                <h1>Настройки страницы "О компании"</h1>
            </div>
        </div>
    </div>

    <Loader v-if="views.loading" />

    <div v-if="!views.loading" class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <div class="w-100">
            <div class="box mb-4 p-4">
                <div class="mb-0">
                    <label class="form-label">Текст</label>
                    <ckeditor :editor="editor" v-model="description" :config="editorConfig"></ckeditor>
                </div>
            </div>

            <button @click="save()" class="btn btn-primary mb-4">Сохранить</button>
        </div>
    </div>
</template>

<script>
import Loader from '../Loader.vue'
import ClassicEditor from '@ckeditor/ckeditor5-build-classic'

export default {
    data() {
        return {
            aboutPage: {},

            description: '',

            views: {
                loading: true,
            },

            editor: ClassicEditor,
            editorData: '',
            editorConfig: {
                toolbar: [ 'heading', 'bold', '|', 'bulletedList', 'numberedList', '|', 'insertTable', '|', 'undo', 'redo' ],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Тег P' },
                    ]
                },
            },
        }
    },
    created() {
        this.loadAboutPage()
    },
    methods: {
        loadAboutPage() {
            axios.get('/_admin/about-page')
            .then(response => {
                this.aboutPage = response.data

                this.description = response.data.description

                this.views.loading = false
            })
        },
        save() {
            if(!this.description.length) {
                return this.$swal({
                    text: 'Заполните страницу',
                    icon: 'error',
                })
            }

            axios.post('/_admin/about-page', {
                description: this.description,
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