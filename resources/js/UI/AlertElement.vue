<template>
    <div>
        <div class="mb-3 w-50" v-if="serverAnswer !== '' && codeAnswer !== 0">
            <div class="alert alert-dismissible" :class="getStyleAlert(codeAnswer)">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
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
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
