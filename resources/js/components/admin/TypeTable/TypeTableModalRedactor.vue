<template>
    <div class="d-flex flex-column gap-2 w-75">
        <label for="name" class="text-secondary">Наименование типа стола</label>
        <input-text id="name" v-model="name" aria-describedby="username-help"/>
        <small id="name-help">
            <span class="text-danger">{{ this.message }}</span>
        </small>
    </div>
    <div class="mt-3">
        <div class="form-group">
            <button class="btn btn-success" @click="sendData" :disabled="this.loading">Добавить</button>
        </div>
    </div>
</template>

<script>
import InputText from "primevue/inputtext";
import axios from "axios";
export default {
    components: {
        InputText
    },
    data(){
        return {
            name: "",
            type_tables: null,
            message: "",
            loading: true,
        }
    },
    mounted() {
        axios.get('/api/types-table').then(resp => {
            this.type_tables = resp.data;
            this.loading = false;
        });
    },
    methods: {
        sendData(){
            if(this.name.length > 3){
                const len = this.type_tables.filter(obj => obj.name === this.name).length;
                if(len === 0){
                    this.loading = true;
                    axios.post('/api/types-table/store',
                        { name: this.name });
                    window.location.href = '/admin/type-table';
                    this.loading = false;
                } else this.message = 'Подобный тип стола уже существует!';
            } else this.message = "Поле наименование должно быть больше 3!";
        }
    }
}
</script>
