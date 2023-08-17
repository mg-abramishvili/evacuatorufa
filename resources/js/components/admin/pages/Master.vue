<template>
    <div class="subheader w-100 mb-4">
        <div class="row align-items-center">
            <div class="col-12">
                <h1 v-if="$route.params.id">{{ page.name }}</h1>
                <h1 v-else>Новая страница</h1>
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
                            <label class="form-label">Название</label>
                            <input v-model="name" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Символьный код</label>
                            <input v-model="slug" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-lg-2">
                        <div class="mb-3">
                            <label class="form-label">Цена (от)</label>
                            <input v-model="price" type="number" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-lg-2">
                        <div class="mb-3">
                            <label class="form-label">Сортировка</label>
                            <input v-model="order" type="number" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="box mb-4 p-4">
                <div class="mb-3">
                    <label class="form-label">SEO Meta Title</label>
                    <input v-model="meta_title" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">SEO Meta Description</label>
                    <input v-model="meta_description" type="text" class="form-control">
                </div>
            </div>

            <div class="box mb-4 p-4">
                <h5 class="mb-4">Блок с описанием #1</h5>
                <div class="mb-3">
                    <label class="form-label">Заголовок</label>
                    <input v-model="desc1_title" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Текст</label>
                    <ckeditor :editor="editor" v-model="desc1_text" :config="editorConfig"></ckeditor>
                </div>
            </div>

            <div class="box mb-4 p-4">
                <h5 class="mb-4">Блок с описанием #2</h5>
                <div class="mb-3">
                    <label class="form-label">Заголовок</label>
                    <input v-model="desc2_title" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Текст</label>
                    <ckeditor :editor="editor" v-model="desc2_text" :config="editorConfig"></ckeditor>
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
            page: {},

            name: '',
            slug: '',
            price: '',
            order: '',
            meta_title: '',
            meta_description: '',
            desc1_title: '',
            desc1_text: '',
            desc2_title: '',
            desc2_text: '',

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
        if(this.$route.params.id) {
            this.loadPage()
        } else {
            this.views.loading = false
        }
    },
    methods: {
        loadPage() {
            axios.get(`/_admin/page/${this.$route.params.id}`)
            .then(response => {
                this.page = response.data

                this.name = response.data.name
                this.slug = response.data.slug
                this.price = response.data.price
                this.order = response.data.order
                this.meta_title = response.data.meta_title
                this.meta_description = response.data.meta_description
                this.desc1_title = response.data.desc1_title
                this.desc1_text = response.data.desc1_text
                this.desc2_title = response.data.desc2_title
                this.desc2_text = response.data.desc2_text

                this.views.loading = false
            })
        },
        save() {
            if(!this.name.length) {
                return this.$swal({
                    text: 'Укажите название',
                    icon: 'error',
                })
            }
            if(!this.slug.length) {
                return this.$swal({
                    text: 'Укажите символьный код',
                    icon: 'error',
                })
            }
            if(!this.price) {
                return this.$swal({
                    text: 'Укажите цену',
                    icon: 'error',
                })
            }
            if(!this.order) {
                return this.$swal({
                    text: 'Укажите сортировку',
                    icon: 'error',
                })
            }
            if(!this.meta_title.length) {
                return this.$swal({
                    text: 'Укажите meta_title',
                    icon: 'error',
                })
            }
            if(!this.meta_description.length) {
                return this.$swal({
                    text: 'Укажите meta_description',
                    icon: 'error',
                })
            }
            if(!this.desc1_title.length) {
                return this.$swal({
                    text: 'Укажите desc1_title',
                    icon: 'error',
                })
            }
            if(!this.desc1_text.length) {
                return this.$swal({
                    text: 'Укажите desc1_text',
                    icon: 'error',
                })
            }
            if(!this.desc2_title.length) {
                return this.$swal({
                    text: 'Укажите desc2_title',
                    icon: 'error',
                })
            }
            if(!this.desc2_text.length) {
                return this.$swal({
                    text: 'Укажите desc2_text',
                    icon: 'error',
                })
            }

            axios.put(`/_admin/page/${this.$route.params.id}/update`, {
                name: this.name,
                slug: this.slug,
                price: this.price,
                order: this.order,
                meta_title: this.meta_title,
                meta_description: this.meta_description,
                desc1_title: this.desc1_title,
                desc1_text: this.desc1_text,
                desc2_title: this.desc2_title,
                desc2_text: this.desc2_text,
            })
            .then(response => {
                this.$router.push({ name: 'Pages'})
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