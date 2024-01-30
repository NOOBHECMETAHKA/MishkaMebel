<template>
    <tr>
        <td>
            <input v-model="materialName"
                   class="form-control"
                   type="text"
                   placeholder="Наименование материала">
        </td>
        <td>
            <select v-model="nameAppointment"
                    class="form-control">
                <option
                    v-for="elementAppointment in JSON.parse(this.$parent.appointment)"
                    :value="elementAppointment">{{ elementAppointment }}
                </option>
            </select>
        </td>
        <td>
            <div class="btn-group">
                <button
                    class="btn btn-warning">Изменить
                </button>
                <button
                    @click.prevent="deleteObjectMaterial()"
                    class="btn btn-danger">Удалить
                </button>
            </div>
        </td>
    </tr>
</template>

<script>
import axios from 'axios';
export default {
    data(){
        return {
            materialID: 0,
            materialName: "",
            nameAppointment: "",
        }
    },
    props: {
        element: Object
    },
    methods: {
        setMaterialValues(material){
            this.materialName = material.name;
            this.nameAppointment = material.appointment;
        },
        deleteObjectMaterial(){
            axios.delete(`/api/materials/delete/${this.element.id}`)
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

            this.$parent.refreshData();
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
