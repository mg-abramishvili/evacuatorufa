<template>
    <div class="subheader w-100 mb-4">
        <div class="row align-items-center">
            <div class="col-12">
                <h1>Настройки главной страницы</h1>
            </div>
        </div>
    </div>

    <Loader v-if="views.loading" />

    <div v-if="!views.loading" class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <div class="w-100">
            <div class="box mb-4 p-4">
                <h5 class="mb-4">Вступительный текст</h5>

                <div class="mb-3">
                    <label class="form-label">Заголовок</label>
                    <input v-model="text1_header" type="text" class="form-control">
                </div>
                <div class="mb-0">
                    <label class="form-label">Текст</label>
                    <ckeditor :editor="editor" v-model="text1" :config="editorConfig"></ckeditor>
                </div>
            </div>

            <div class="box mb-4 p-4">
                <h5 class="mb-4">Дешевая эвакуация</h5>

                <div class="mb-3">
                    <label class="form-label">Заголовок</label>
                    <input v-model="text2_header" type="text" class="form-control">
                </div>
                <div class="mb-0">
                    <label class="form-label">Текст</label>
                    <ckeditor :editor="editor" v-model="text2" :config="editorConfig"></ckeditor>
                </div>
            </div>

            <div class="box mb-4 p-4">
                <h5 class="mb-4">Нижний текст</h5>

                <div class="mb-3">
                    <label class="form-label">Заголовок</label>
                    <input v-model="text3_header" type="text" class="form-control">
                </div>
                <div class="mb-0">
                    <label class="form-label">Текст</label>
                    <ckeditor :editor="editor" v-model="text3" :config="editorConfig"></ckeditor>
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
            homepage: {},

            text1: '',
            text1_header: '',
            text2: '',
            text2_header: '',
            text3: '',
            text4_header: '',

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
        this.loadHomePage()
    },
    methods: {
        loadHomePage() {
            axios.get('/_admin/homepage')
            .then(response => {
                this.homepage = response.data

                this.text1 = response.data.text1
                this.text1_header = response.data.text1_header
                this.text2 = response.data.text2
                this.text2_header = response.data.text2_header
                this.text3 = response.data.text3
                this.text3_header = response.data.text3_header

                this.views.loading = false
            })
        },
        save() {
            if(!this.text1.length) {
                return this.$swal({
                    text: 'Укажите вступительный текст',
                    icon: 'error',
                })
            }
            if(!this.text1_header.length) {
                return this.$swal({
                    text: 'Укажите заголовок вступительного текста',
                    icon: 'error',
                })
            }
            if(!this.text2.length) {
                return this.$swal({
                    text: 'Укажите текст Дешевая эвакуация',
                    icon: 'error',
                })
            }
            if(!this.text2_header.length) {
                return this.$swal({
                    text: 'Укажите заголовок для текста Укажите текст Дешевая эвакуация',
                    icon: 'error',
                })
            }
            if(!this.text3.length) {
                return this.$swal({
                    text: 'Укажите нижний текст',
                    icon: 'error',
                })
            }
            if(!this.text3_header.length) {
                return this.$swal({
                    text: 'Укажите заголовок для нижнего текста',
                    icon: 'error',
                })
            }

            axios.post('/_admin/homepage', {
                text1: this.text1,
                text1_header: this.text1_header,
                text2: this.text2,
                text2_header: this.text2_header,
                text3: this.text3,
                text3_header: this.text3_header,
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