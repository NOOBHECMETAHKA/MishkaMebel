<template>
    <div class="col-12">
        <div class="card p-3">
<!--            <p>{{ collectionInfo }}</p>-->
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
                <template #empty><span class="text-secondary">Персональная информация не найдена!</span></template>

                <Column expander style="width: 5rem"/>

                <template #expansion="slotProps">
                    <div v-if="slotProps.data.personal_information === null">
                        <div class="alert alert-default-secondary w-25">
                            <span>Персональная информация отсуствует!</span>
                        </div>
                        <personal-information-user-modal-redactor :obj-user="slotProps.data" @success-send-personal-info="refresh"/>
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
                        <form class="form-group" v-if="this.userRole === 'admin'">
                            <button class="btn btn-danger" @click.prevent="deletePersonalInfo(slotProps.data)">Удалить персональную информацию</button>
                        </form>
                    </div>
                    <personal-information-role-modal-redactor
                        v-if="this.userRole === 'admin'"
                        :obj-user="slotProps.data"
                        :obj-role="slotProps.data.role"
                        :obj-roles="availableRoles"
                        @success-send-personal-info="refresh"/>
                </template>

                <Column class="text-secondary" header="Электронная почта" field="email"></Column>

                <Column class="text-secondary" header="Персональная информация">
                    <template #body="slotProps">
                        <Tag
                            :value="slotProps.data.personal_information === null  ? 'Отсуствует' : 'Есть'"
                            :severity="slotProps.data.personal_information === null ? 'danger' : 'success'" />
                    </template>
                </Column>

                <Column class="text-secondary" field="role" header="Роль">
                    <template #body="slotProps">
                        <Tag
                            :icon="getIconByRoleUser(slotProps.data.role)"
                            :severity="getValueStyleTagByRole(slotProps.data.role)"
                            :value="this.availableRoles[slotProps.data.role]"/>
                    </template>
                </Column>

                <template #paginatorstart>
                    <span class="text-secondary" v-if="this.userRole === 'admin'">Количество записей: {{ this.count }}</span>
                </template>

                <template #paginatorend>
                    <vue-button
                        type="button"
                        icon="pi pi-refresh"
                        @click.prevent="refresh()"
                        text/>
                </template>
            </DataTable>
        </div>
    </div>
</template>

<script>
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from "primevue/button";
import axios from "axios";
import {FilterMatchMode} from "primevue/api";
import { PrimeIcons } from 'primevue/api';

import InputText from "primevue/inputtext";
import InputMask from "primevue/inputmask";

import Tag from "primevue/tag";
import PersonalInformationUserModalRedactor from "./PersonalInformationUserModalRedactor.vue";
import PersonalInformationRoleModalRedactor from "./PersonalInformationRoleModalRedactor.vue";

export default {
    props: {
      objRoles: String,
      userRole: String
    },
    data() {
        return {
            collectionInfo: null,
            count: 0,
            filters: {
                global: { value: null, matchMode: FilterMatchMode.CONTAINS },
            },
            loading: true,
            selectedElement: null,
            expandedRows: null,
            availableRoles: null
        };
    },
    components:{
        PersonalInformationUserModalRedactor,
        PersonalInformationRoleModalRedactor,

        DataTable,
        Column,
        InputText,
        VueButton: Button,
        PrimeIcons,
        Tag,
        InputMask,
    },
    mounted() {
        this.availableRoles = JSON.parse(this.objRoles);
        this.refresh();
    },
    methods: {
        refresh(){
            this.loading = true;
            axios.get('/api/personal-information').then(resp => {
                this.collectionInfo = resp.data.data;
                this.count = resp.data.data.length;

                if(this.userRole === 'manager'){
                    this.collectionInfo = this.collectionInfo.filter(el => el.personal_information !== null);
                }


                this.loading = false;
            });
        },
        getIconByRoleUser(role){
            switch(role){
                case 'user':
                    return 'pi pi-user';
                case 'manager':
                    return 'pi pi-tag';
                case 'admin':
                    return 'pi pi-wrench';
            }
        },
        getValueStyleTagByRole(role){
            switch(role){
                case 'user':
                    return 'info';
                case 'manager':
                    return 'success';
                case 'admin':
                    return 'danger';
            }
        },
        deletePersonalInfo(slotData){
            this.loading = true;
            const personal_info_id  = slotData.personal_information.id;
            if(personal_info_id !== null){
                axios.post(`api/personal-information/delete/${personal_info_id}`).then(resp => {
                    this.refresh();
                    this.loading = false;
                });
            }
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
