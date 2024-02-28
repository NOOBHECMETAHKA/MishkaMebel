<template>
    <div class="card w-50">
        <div class="card-header">
            <div class="d-flex w-100 justify-content-md-end">
                <PieChartBootstrap5Icon @click.prevent="setOtherType" v-if="!this.isChartVisual" style="color: var(--primary-color);"/>
                <ReceptionBootstrap5Icon @click.prevent="setOtherType" v-else style="color: var(--primary-color);"/>
            </div>
        </div>
        <div class="card-body">
            <i class="pi pi-spin pi-cog text-secondary" style="font-size: 2rem" v-if="this.loading"></i>
            <chart :type="this.isChartVisual ? 'bar' : 'pie'" :data="chartData" :options="chartOptions" v-else/>
        </div>
    </div>
</template>

<script>
import Chart from 'primevue/chart';
import { PrimeIcons } from 'primevue/api';

import PieChartBootstrap5Icon from "@/svg/PieChart-Bootstrap5-Icon.vue";
import QuestionCircleBootstrap5Icon from "@/svg/QuestionCircle-Bootstrap5-Icon.vue";
import ReceptionBootstrap5Icon from "@/svg/Reception-Bootstrap5-Icon.vue";

export default {
    props: {
        objData: String,
    },
    components: {
        Chart,
        PieChartBootstrap5Icon,
        QuestionCircleBootstrap5Icon,
        ReceptionBootstrap5Icon,
    },
    data(){
        return {
            statisticData: null,
            chartData: null,
            chartOptions: null,
            loading: true,
            isChartVisual: false
        };
    },
    mounted() {
        this.statisticData = JSON.parse(this.objData);
        this.chartData = this.setChartData();
        this.chartOptions = this.setChartOptions();
    },
    methods: {
        setOtherType(){
            this.isChartVisual = !this.isChartVisual
        },
        setChartData(){
            this.loading = false;
            return {
                labels: [
                    'Матрасы',
                    'Чехлы',
                    'Кровати',
                    'Хранилища вещей',
                    'Столы'
                ],
                datasets: [
                    {
                        label: 'Соотношвение количества товаров',
                        data: [
                            this.statisticData.countMattress,
                            this.statisticData.countMattressCover,
                            this.statisticData.countBed,
                            this.statisticData.countFurnitureStorage,
                            this.statisticData.countTable
                        ],
                        backgroundColor: [
                            'rgba(249, 115, 22, 0.2)',
                            'rgba(6, 182, 212, 0.2)',
                            'rgba(150, 182, 212, 0.2)',
                            'rgb(107, 114, 128, 0.2)',
                            'rgba(139, 92, 246, 0.2)'
                        ],
                        borderColor: [
                            'rgb(249, 115, 22)',
                            'rgb(6, 182, 212)',
                            'rgb(107, 114, 128)',
                            'rgba(150, 182, 212)',
                            'rgb(139, 92, 246)'
                        ],
                        borderWidth: 1
                    }
                ]
            }
        },
        setChartOptions() {
            const documentStyle = getComputedStyle(document.documentElement);
            const textColor = documentStyle.getPropertyValue('--text-color');
            const textColorSecondary = documentStyle.getPropertyValue('--text-color-secondary');
            const surfaceBorder = documentStyle.getPropertyValue('--surface-border');

            return {
                plugins: {
                    legend: {
                        labels: {
                            color: textColor
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            color: textColorSecondary
                        },
                        grid: {
                            color: surfaceBorder
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: textColorSecondary
                        },
                        grid: {
                            color: surfaceBorder
                        }
                    }
                }
            };
        },
    }
}
</script>
