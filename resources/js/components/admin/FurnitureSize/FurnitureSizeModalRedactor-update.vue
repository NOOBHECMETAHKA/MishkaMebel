<template>
    <div class="flex flex-wrap gap-3">
        <div class="d-flex flex-column">
            <label class="font-bold block mb-2 text-secondary">Длина</label>
            <input-number v-model="length" :min="0" :max="1000" inputId="mile" suffix=" cm" :max-fraction-digits="2"/>
        </div>
        <div class="d-flex flex-column">
            <label class="font-bold block mb-2 text-secondary">Ширина</label>
            <input-number v-model="width" :min="0" :max="1000" inputId="mile" suffix=" cm" :max-fraction-digits="2"/>
        </div>

        <div class="form-group mt-3" v-if="message !== ''">
            <span class="error text-danger">{{ this.message}}</span>
        </div>

        <div class="form-group mt-3">
            <button @click="sendData" class="btn btn-warning" :disabled="this.loading">Изменить</button>
        </div>
    </div>
</template>

<script>
import InputNumber from "primevue/inputnumber";
import axios from "axios";

export default {
    props: {
        obj: String
    },
    components: {
        InputNumber
    },
    data(){
        return {
            id: 0,
            length: 0,
            width: 0,
            message: "",
            loading: true,
            furniture_size: null,
        };
    },
    mounted() {
        if(this.obj != null){
            let importSizes = JSON.parse(this.obj);
            this.id = parseInt(importSizes.id);
            this.length = parseFloat(importSizes.length);
            this.width = parseFloat(importSizes.width);
        }
        axios.get('/api/furniture-sizes').then(resp => {
            this.furniture_size = resp.data;
            this.loading = false;
        });
    },
    methods: {
        sendData(){
            if(this.length > 0 || this.width > 0){
                const len = this.furniture_size
                    .filter(obj => obj.length === this.length.toFixed(2) && obj.width === this.width.toFixed(2)).length;
                if(len > 0){
                    this.message = "Подобрые размеры уже существуют!";
                } else {
                    this.loading = true;
                     axios.post(`/api/furniture-size/update/${this.id}`,
                         { length: this.length, width: this.width });
                    window.location.href = '/admin/furniture-size';
                    this.loading = false;
                }
            } else{
                this.message = "Все поля должны быть заполнены!";
            }
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
