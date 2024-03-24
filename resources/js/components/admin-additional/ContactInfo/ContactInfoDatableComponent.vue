<template>
    <div class="card card-primary collapsed-card w-75">
        <div class="card-header">
            <h3 class="card-title">Добавление источника связи</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: none;">
            <form action="" method="post">
                <div class="form-group">
                    <label for=""></label>
                    <div class="w-75">
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="text-secondary">Номер телефона</label>
                    <div class="w-75">
                        <InputMask class="w-100" id="phone" v-model="contact" mask="+7(999) 999-9999" placeholder="Номер телефона"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="text-secondary">Краткое описание</label>
                    <div class="w-75">
                        <InputText class="w-100" type="text" v-model="description" placeholder="Описание приложенного объекта"/>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Добавить</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</template>

<script>
import InputText from 'primevue/inputtext';
import InputMask from "primevue/inputmask";
export default {

    components: {
        InputText,
        InputMask
    },
    data(){
        return {
            contact: null,
            description: null
        };
    }
}
</script>
