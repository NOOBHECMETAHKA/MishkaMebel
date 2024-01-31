<template>
    <div class="col-12">
        <div class="card">
            <DataTable :value="materials" tableStyle="min-width: 50rem">
                <Column field="name" header="Наименование"></Column>
                <Column field="appointment" header="Назначение"></Column>
            </DataTable>
        </div>
    </div>
</template>

<script>
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import axios from "axios";
export default {
    components:{
        DataTable,
        Column,
    },
    data(){
      return{
        materials: null,
      };
    },
    mounted() {
        this.materials = axios.get('/api/materials').then(response => this.materials = response.data);
    }
}
</script>

<style lang="scss" scoped>

</style>
