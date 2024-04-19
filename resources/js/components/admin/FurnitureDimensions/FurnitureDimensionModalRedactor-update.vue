<template>
    <div class="flex flex-wrap gap-3">
        <div class="d-flex flex-column">
            <label class="font-bold block mb-2 text-secondary">Длина</label>
            <input-number v-model="length" :min="0" :max="1000" inputId="mile" suffix=" см" :max-fraction-digits="2"/>
        </div>

        <div class="d-flex flex-column">
            <label class="font-bold block mb-2 text-secondary">Ширина</label>
            <input-number v-model="width" :min="0" :max="1000" inputId="mile" suffix=" см" :max-fraction-digits="2"/>
        </div>

        <div class="d-flex flex-column">
            <label class="font-bold block mb-2 text-secondary">Высота</label>
            <input-number v-model="height" :min="0" :max="1000" inputId="mile" suffix=" см" :max-fraction-digits="2"/>
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
            height: 0,
            message: "",
            loading: true,
            furniture_dimensions: null,
        };
    },
    mounted() {
        if(this.obj != null){
            let importSizes = JSON.parse(this.obj);
            this.id = parseInt(importSizes.id);
            this.length = parseFloat(importSizes.length);
            this.width = parseFloat(importSizes.width);
            this.height = parseFloat(importSizes.height);
        }
        axios.get('/api/furniture-dimensions').then(resp => {
            this.furniture_dimensions = resp.data;
            this.loading = false;
        });
    },
    methods: {
        sendData(){
            if(this.length > 0 || this.width > 0 || this.length > 0){
                const len = this.furniture_dimensions
                    .filter(obj => obj.length === this.length.toFixed(2) &&
                        obj.width === this.width.toFixed(2) &&
                        obj.length === this.height.toFixed(2)).length;
                if(len > 0){
                    this.message = "Подобрые размеры уже существуют!";
                } else {
                    this.loading = true;
                    axios.post(`/api/furniture-dimensions/update/${this.id}`,
                        { length: this.length, width: this.width, height: this.height });
                    window.location.href = '/admin/furniture-dimensions';
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
