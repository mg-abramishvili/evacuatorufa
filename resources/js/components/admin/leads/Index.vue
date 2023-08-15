<template>
    <div class="subheader w-100 mb-4">
        <div class="row align-items-center">
            <div class="col-12">
                <h1>Заявки</h1>
            </div>
        </div>
    </div>

    <Loader v-if="views.loading" />

    <div v-if="!views.loading" class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <div class="w-100">
            <div v-if="leads.length" class="box mb-4">
                <table class="table">
                    <tbody>
                        <tr v-for="lead in leads">
                            <td style="width: 20%">{{ $dayjs(lead.created_at).locale('ru').utcOffset(5).format('DD-MM-YYYY H:mm') }}</td>
                            <td style="width: 20%">{{ lead.tel }}</td>
                            <td style="width: 20%">{{ lead.name }}</td>
                            <td style="width: 20%">
                                <template v-if="lead.text">{{ lead.text }}</template>
                                <template v-else>&mdash;</template>
                            </td>
                            <td class="text-end" style="width: 20%">
                                <button @click="del(lead.id)" class="btn btn-outline-danger">&times;</button>
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
            leads: [],

            views: {
                loading: true,
            }
        }
    },
    created() {
        this.loadLeads()
    },
    methods: {
        loadLeads() {
            axios.get('/_admin/leads')
            .then(response => {
                this.leads = response.data

                this.views.loading = false
            })
        },
        del(id) {
            if (confirm("Точно удалить?")) {
                axios.delete(`/_admin/lead/${id}/delete`)
                .then((response => {
                    this.loadLeads()
                }))
            }
        }
    },
    components: {
        Loader
    }
}
</script>