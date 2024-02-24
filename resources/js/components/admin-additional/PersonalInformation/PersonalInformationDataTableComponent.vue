<template>
    <div class="col-12">
        <div class="card p-3">
            <DataTable
                v-model:expanded-rows="expandedRows"
                selectionMode="single"
                dataKey="email"
                :metaKeySelection="false"
                removableSort
                v-model:filters="filters"
                :loading="loading"
                :value="this.collectionInfo"
                paginator
                :rows="5"
                :rowsPerPageOptions="[5, 10, 20, 50]"
                :size="'small'"
                tableStyle="min-width: 50rem">
                <template #header>
                    <div class="d-flex justify-content-between">
                        <span class="p-input-icon-left">
                            <i class="pi pi-search" />
                            <InputText v-model="filters['global'].value" placeholder="Найти" class="text-secondary"/>
                        </span>
                    </div>
                </template>
                <template #empty><span class="text-secondary">Персональная информация не найдены!</span></template>

                <Column expander style="width: 5rem"/>

                <template #expansion="slotProps">
                    <div v-if="slotProps.data.personal_information === null">
                        <span>Персональная информация отсуствует!</span>
                    </div>
                    <div v-else>
                        <table class="table table-bordered">
                            <tbody>
                                <tr data-widget="expandable-table" aria-expanded="false">
                                    <td>Полное имя</td>
                                    <td>{{ slotProps.data.personal_information.name}}</td>
                                    <td>Номер телефона</td>
                                    <td>{{ slotProps.data.personal_information.phone_number}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </template>

                <Column header="Роль" field="role"></Column>

                <Column header="Электронная почта" field="email"></Column>

                <Column header="Персональная информация">
                    <template #body="slotProps">
                        <Tag :value="slotProps.data.personal_information === null  ? 'Отсуствует' : 'Есть'" :severity="slotProps.data.personal_information === null ? 'danger' : 'success'" />
                    </template>
                </Column>

                <template #paginatorstart>
                    <span class="text-secondary">Количество записей: {{ this.count }}</span>
                </template>

                <template #paginatorend>
                    <vue-button type="button" icon="pi pi-refresh" @click.prevent="refresh()" text/>
                </template>
            </DataTable>
        </div>
    </div>
</template>

<script>
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import axios from "axios";
import {FilterMatchMode} from "primevue/api";
import { PrimeIcons } from 'primevue/api';

import Tag from "primevue/tag";

export default {
    data() {
        return {
            collectionInfo: null,
            count: 0,
            filters: {
                global: { value: null, matchMode: FilterMatchMode.CONTAINS },
            },
            loading: true,
            selectedElement: null,
            expandedRows: null
        };
    },
    components:{
        DataTable,
        Column,
        InputText,
        VueButton: Button,
        PrimeIcons,
        Tag
    },
    mounted() {
        this.refresh();
    },
    methods: {
        refresh(){
            this.loading = true;
            axios.get('/api/personal-information').then(resp => {
                this.collectionInfo = resp.data;
                this.count = resp.data.length;
                this.loading = false;
            });
        },
    }
}
</script>

<style lang="scss" scoped>

</style>
