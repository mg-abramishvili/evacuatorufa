<template>
    <div class="subheader w-100 mb-4">
        <div class="row align-items-center">
            <div class="col-12">
                <h1>Страницы</h1>
            </div>
        </div>
    </div>

    <Loader v-if="views.loading" />

    <div v-if="!views.loading" class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <div class="w-100">
            <div v-if="pages.length" class="box mb-4">
                <table class="table">
                    <tbody>
                        <tr v-for="page in pages">
                            <td>
                                {{ page.name }}
                                <small class="d-block text-muted">{{ page.slug }}</small>
                            </td>
                            <td class="text-end">
                                <router-link :to="{ name: 'PageMaster', params: { id: page.id }}" class="btn btn-outline-primary">Изменить</router-link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p v-else>Заявок нет.</p>
        </div>
    </div>
</template>

<script>
import Loader from '../Loader.vue'

export default {
    data() {
        return {
            pages: [],

            views: {
                loading: true,
            }
        }
    },
    created() {
        this.loadPages()
    },
    methods: {
        loadPages() {
            axios.get('/_admin/pages')
            .then(response => {
                this.pages = response.data

                this.views.loading = false
            })
        },
    },
    components: {
        Loader
    }
}
</script>