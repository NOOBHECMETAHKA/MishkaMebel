<template>
    <div class="col-12">
        <message-alert :codeAnswer="codeAnswer" :serverAnswer="serverAnswer"></message-alert>
        <material-add-form></material-add-form>
        <div class="card">
            <!--        HeaderOfTable-->
            <div class="card-header">
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="max-width: 300px;">
                        <input v-model="search" type="text" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!--        ./HeaderOfTable-->
            <!--        TableList-->
            <div class="card-body table-responsive p-0" v-if="formatList.length > 0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th class="text-secondary">
                            <a @click="setSortParam('name')">Наименование
                                <img v-if="sortReverse"
                                     :class="sortParam==='name' ? '' : 'invisible'"
                                     src="../../../svg/icon_sort_mode.svg"
                                     alt=""
                                     class="__icon_sort_mode">
                                <img v-else
                                     :class="sortParam==='name' ? '' : 'invisible'"
                                     src="../../../svg/icon_reverse_sort_mode.svg"
                                     alt=""
                                     class="__icon_sort_mode">
                            </a>
                        </th>
                        <th class="text-secondary">
                            <a @click="setSortParam('appointment')">Назначение
                                <img v-if="sortReverse"
                                     :class="sortParam==='appointment' ? '' : 'invisible'"
                                     src="../../../svg/icon_sort_mode.svg"
                                     alt=""
                                     class="__icon_sort_mode">
                                <img v-else
                                     :class="sortParam==='appointment' ? '' : 'invisible'"
                                     src="../../../svg/icon_reverse_sort_mode.svg"
                                     alt=""
                                     class="__icon_sort_mode">
                            </a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <template v-for="material in formatList">
<!--                     ShowElements-->
                        <tr>
                            <td>{{ material.name }}</td>
                            <td>{{ material.appointment }}</td>
                            <td>
                                <button @click.prevent="selectKeyValue(material)"
                                        class="btn btn-success">Отредактировать</button>
                            </td>
                        </tr>
<!--                    ./ShowElements-->
<!--                    UpdateForm-->
                        <material-update-form
                            :ref="`materialUpdateFormRef_${material.id}`"
                            :class="isEdit(material.id) ? '' : 'd-none'">
                        </material-update-form>
<!--                    ./UpdateForm-->
                    </template>
                    </tbody>
                </table>
            </div>
            <!--        ./TableList-->
            <!--        Fail block-->
            <div class="card-body table-responsive p-2 text-secondary" v-else>Ничего не найдено!</div>
            <!--        ./Fail block-->
        </div>
        <!--        Pagination-->
        <ul class="pagination justify-content-center" v-if="search.length === 0 && pageCount > 1">
            <li class="page-item" v-for="page in pageCount" :class="page === this.currentPage ? 'active' : ''">
                <a @click.prevent="setCurrentPage(page)" class="page-link">{{ page }}</a>
            </li>
        </ul>
        <!--        ./Pagination-->
    </div>
</template>

<script>
import axios from 'axios';
import materialAddObjectComponent from "./MaterialAddObjectComponent.vue";
import materialUpdateObjectComponent from "./MaterialUpdateDeleteObjectComponent.vue";
import AlertElement from "../../../UI/AlertElement.vue";

export default {
    components: {
        //Форма добвления записей
        MaterialAddForm: materialAddObjectComponent,
        MaterialUpdateForm: materialUpdateObjectComponent,
        messageAlert: AlertElement
    },
    props: {
        //Массив в формате json - назначения материалов
        appointment: String
    },
    /**
     * collection - парсинг с API текущего списка элементов
     * search - строка поиска значения в строках объектов
     * sortParam - параметр по которому происходит сортировка
     * sortReverse - порядок сортировки по параметру
     *
     * @returns {{sortParam: string, search: string, sortReverse: boolean, collection: *[]}}
     */
    data: function () {
        return {
            collection: [],
            search: "",
            sortParam: "appointment",
            sortReverse: false,

            keyEditElement: '',

            currentPage: 1,
            itemsPerPage: 6,

            serverAnswer: "",
            codeAnswer: 0,
        }
    },
    mounted() {
        this.refreshData();
    },
    methods: {
        manipulationList() {
            //Фильтрация полученных данных
            let formattedCollection = this.collection.filter(
                ({name, appointment}) => [name, appointment]
                    .some(val => val.toLowerCase().includes(this.search.toLowerCase()))
            );

            //Сортировка получеченных данных
            formattedCollection.sort((a, b) => (a[this.sortParam] > b[this.sortParam]) ? 1 : -1)

            //Изменение порядка сортировки
            if(this.sortReverse)
                formattedCollection.reverse();

            //Установка пароговых значений для пагинации
            const startIndex = (this.currentPage - 1) * this.itemsPerPage;
            const endIndex = startIndex + this.itemsPerPage;

            //Форматирование коллекции в соотвествии с разрезом
            formattedCollection = formattedCollection.slice(startIndex, endIndex);

            return formattedCollection;
        },
        refreshData(){
            axios.get("/api/materials").then((res) => {
                this.collection = res.data;
            })
        },
        setCurrentPage(pageNumber) {
            this.currentPage = pageNumber;
        },
        selectKeyValue(material){
            if(this.keyEditElement === material.id)
                this.keyEditElement = null;
            else
                this.keyEditElement = material.id;

            this.$refs[`materialUpdateFormRef_${material.id}`][0].setMaterialValues(material);
        },
        setSortParam(value){
            if(this.sortParam === value)
                this.sortReverse = !this.sortReverse;
            else
                this.sortParam = value;
        },
        isEdit(id){
            return this.keyEditElement === id;
        },
    },
    computed: {
        //Формирование количества страниц
        pageCount() {
            return Math.ceil(this.collection.length / this.itemsPerPage);
        },
        //Манипуляции над списком элементов
        formatList() {
            return this.manipulationList();
        }
    }
}
</script>

<style lang="scss">
    .__icon_sort_mode{
        box-sizing: border-box;
        width: 20px;
    }
</style>
