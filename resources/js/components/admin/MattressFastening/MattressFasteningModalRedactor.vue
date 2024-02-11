<template>
    <div class="d-flex flex-column gap-2 w-75">
        <label for="name" class="text-secondary">Наименование крепления</label>
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
          mattress_fastening: null,
          message: "",
          loading: true,
      }
    },
    mounted() {
        axios.get('/api/mattress-fastenings').then(resp => {
            this.mattress_fastening = resp.data;
            this.loading = false;
        });
    },
    methods: {
        sendData(){
           if(this.name.length > 0){
               const len = this.mattress_fastening.filter(obj => obj.name === this.name).length;
               if(len === 0){
                   this.loading = true;
                   axios.post('/api/mattress-fastenings/store',
                       { name: this.name });
                   window.location.href = '/admin/mattress-fastening';
                   this.loading = false;
               } else this.message = 'Подобное крепление уже существует!';
           } else this.message = "Поле наименование должно быть заполнено!";
        }
    }
}
</script>
