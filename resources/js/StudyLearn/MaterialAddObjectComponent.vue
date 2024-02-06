<template>
    <div class="card collapsed-card mt-3">
        <div class="card-header">
<!--            Title-->
            <h3 class="card-title text-secondary">Добавление материалов</h3>
<!--            Title-->
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
<!--            Body form-->
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
                    <button @click.prevent="this.createObjectMaterial" class="btn btn-success">Добавить</button>
                </div>
            </div>
<!--            ./Body form-->
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "MaterialPostForm",
    data(){
        return {
            materialName: "",
            nameAppointment: "",
            selectedMaterial: null
        }
    },
    methods:{
        createObjectMaterial(){
            axios.post('/api/materials/store', { name: this.materialName, appointment: this.nameAppointment })
                .then(response => {
                    console.log(response);
                    this.$parent.serverAnswer = response.data.message;
                    this.$parent.codeAnswer = response.status;
                })
                .catch(response => {
                    console.log(response);
                    this.$parent.serverAnswer = response.response.data.message;
                    this.$parent.codeAnswer = response.response.status;
                });
            this.materialName = "";
            this.nameAppointment = "";

            this.$parent.refreshData();
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
