<template>
    <div class="card collapsed-card">
        <div class="card-header">
            <h3 class="card-title text-secondary">Редактор</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: none;">
            <div class="form-group">
                <div class="mb-3">
                    <label for="nameMaterial" class="text-secondary">Наименование</label>
                    <input v-model="materialName" id="nameMaterial" class="form-control" type="text" placeholder="Наименование материала">
                </div>
                <div class="mb-3">
                    <label for="nameAppointment" class="text-secondary">Назначение</label>
                    <select v-model="nameAppointment" class="form-control" id="nameAppointment">
                        <option v-for="elementAppointment in JSON.parse(this.$parent.appointment)" :value="elementAppointment">{{ elementAppointment }}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <button class="btn btn-success">Добавить</button>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</template>

<script>
import InputText from "primevue/inputtext";
import Dropdown from "primevue/dropdown";
export default {
    components: {
        Dropdown,
        InputText
    },
    data(){
        return {
            materialName: null,
            nameAppointment: null,
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
