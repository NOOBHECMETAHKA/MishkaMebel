<template>
    <div>
        <div ref="alert-block" class="mb-3 w-50 __alert" v-if="getPermission()">
            <div class="alert alert-dismissible" :class="getStyleAlert(codeAnswer)">
                <button @click="clickCloseWindow" class="close">&times;</button>
                <h5><i :class="getStyleAlertIcon(codeAnswer)"></i>Что-то пошло не так!</h5>
                <strong>Подробнее: </strong>Статус код: {{ this.codeAnswer }}. Сообщение от сервера: {{ this.serverAnswer }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        codeAnswer: 0,
        serverAnswer: ""
    },
    methods:{
        getStyleAlert(code){
            if(code <= 299){
                return 'alert-success'
            } else if (code <= 499){
                return 'alert-warning'
            } else if (code <= 599){
                return 'alert-danger'
            }
        },
        getStyleAlertIcon(code){
            if(code <= 299){
                return 'icon fas fa-check'
            } else if (code <= 499){
                return 'icon fas fa-exclamation-triangle'
            } else if (code <= 599){
                return 'icon fas fa-ban'
            }
        },
        getPermission(){
            return !(this.codeAnswer === 0 && this.serverAnswer === "");
        },
        clickCloseWindow(){
            this.$refs["alert-block"].style.display = 'none';
        },
        openWindow(){
            this.$refs["alert-block"].style.display = 'block';
        }
    },

}
</script>

<style lang="scss" scoped>
    .__alert{
        position: fixed;
        z-index: 1035;
        top: 30px;
        right: 0;
    }
</style>
